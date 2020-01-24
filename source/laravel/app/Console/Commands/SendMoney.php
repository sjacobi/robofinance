<?php

namespace App\Console\Commands;

use App\Jobs\MoneyTransactionHandler;
use Illuminate\Console\Command;
use App\Repositories\TransactionRepository;

class SendMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:money';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command send money between users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(TransactionRepository $transactionRepository)
    {
        $readyTransactions = $transactionRepository->getTransactionsReadyToExecute();

        foreach ($readyTransactions as $readyTransaction) {
            MoneyTransactionHandler::dispatch($readyTransaction);
        }

    }

}
