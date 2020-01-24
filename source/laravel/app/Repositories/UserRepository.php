<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\User;

class UserRepository
{

    public function getAllUsers()
    {
        return User::all();
    }

    public function getBalance()
    {
        return auth()->user()->balance;
    }




}
