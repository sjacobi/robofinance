<?php

namespace App\Repositories;

use App\Helpers\TimeHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Transaction;

class TransactionRepository
{

    public function getAllLastTransactionsForUsers()
    {
        $sql = /** @lang text */
            "
        SELECT 
        users.id as user_id, 
        users.name as user_name, 
        transactions.id as transaction_id, 
        toUser.name as to_user_name,  
        fromUser.name as from_user_name,  
        transactions.amount as transaction_amount,  
        transactions.created_at as transaction_created_at  
        FROM users 
        INNER JOIN transactions ON transactions.id = (SELECT MAX(id) as id FROM transactions WHERE transactions.from_user_id = users.id AND transactions.status = 2) 
        INNER JOIN users toUser ON(transactions.to_user_id = toUser.id)
        INNER JOIN users fromUser ON(transactions.from_user_id = fromUser.id)
        order by transactions.id DESC 
        ";

        return DB::select($sql);
    }

    public function getSumFromUnresolvedTransactions()
    {
        return auth()->user()->transactions()->where(['status' => Transaction::STATUS_WAITING])->sum('amount');
    }

    public function createTransaction(int $to_user_id, $datetime, int $money)
    {
        $data = [
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $to_user_id,
            'status' => Transaction::STATUS_WAITING,
            'transfer_time' => TimeHelper::toMySQL($datetime),
            'amount' => $money,
        ];
        return Transaction::create($data);
    }

    public function getTransactionsReadyToExecute()
    {
        return Transaction::where(['status' => Transaction::STATUS_WAITING])
            ->whereDate('transfer_time', '<=', Carbon::now())
            ->get();
    }


}
