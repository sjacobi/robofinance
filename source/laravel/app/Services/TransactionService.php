<?php

namespace App\Services;

use App\Helpers\MoneyHelper;

use App\Repositories\UserRepository;
use App\Repositories\TransactionRepository;

use App\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    public $error = null;

    private $userRepository;
    private $transactionRepository;

    public function __construct(
        UserRepository $userRepository,
        TransactionRepository $transactionRepository
    ) {
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function testBalance(int $money)
    {
        $balance = $this->userRepository->getBalance();
        $unresolvedBalance = $this->transactionRepository->getSumFromUnresolvedTransactions();

        if ($balance - ($unresolvedBalance + $money) < 0) {
            return false;
        }

        return true;
    }

    public function sendMoney(int $to_user_id, $datetime, int $money)
    {
        $money = MoneyHelper::encode($money);

        DB::beginTransaction();

        try {

            if ($this->testBalance($money)) {

                $this->transactionRepository->createTransaction($to_user_id, $datetime, $money);

            } else {
                throw new \ErrorException('Недостаточно денег');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            $this->error = $e->getMessage();

            return false;
        }

        return true;
    }

    public function executeTransaction(Transaction $transaction)
    {

        DB::transaction(function () use ($transaction) {

            $user = $transaction->user;

            if (($user->balance - $transaction->amount) >= 0) {

                $user->balance -= $transaction->amount;
                $user->save();

                $transaction->status = Transaction::STATUS_COMPLETED;
                $transaction->save();
            }

        });

    }


}
