<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionStoreRequest;
use Illuminate\Support\Facades\Session;
use App\Services\TransactionService;

class TransactionController extends Controller
{

    public function create()
    {
        return view('transactions.create');
    }

    public function store(TransactionStoreRequest $request, TransactionService $transactionService)
    {

        $data = $request['Transaction'];
        $result = $transactionService->sendMoney($data['to_user'], $data['datetime'], $data['amount']);

        if ($result) {
            Session::flash('alert-success', 'Транзакция успешно создана');
            return redirect()->route('home');
        } else {
            Session::flash('alert-danger', $transactionService->error);
            return redirect()->back()->withInput();
        }


    }

}
