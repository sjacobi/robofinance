<?php

namespace App\Jobs;

use App\Services\TransactionService;
use App\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class MoneyTransactionHandler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $transaction;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TransactionService $transactionService)
    {
        $transactionService->executeTransaction($this->transaction);
    }
}
