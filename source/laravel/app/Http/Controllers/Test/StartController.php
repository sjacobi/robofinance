<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;

class StartController extends Controller
{

    public function view(TransactionRepository $transactionRepository)
    {
        $lastUsersTransactionsArray = $transactionRepository->getAllLastTransactionsForUsers();

//        dd($lastUsersTransactionsArray);

        return view('transactions.list', [
            'lastUsersTransactionsArray' => $lastUsersTransactionsArray
        ]);
    }

}
