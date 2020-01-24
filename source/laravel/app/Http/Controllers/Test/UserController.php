<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function view(UserRepository $userRepository)
    {
        $users = $userRepository->getAllUsers();

        return view('users.list', [
            'users' => $users
        ]);
    }

    public function select($userId)
    {
        Auth::loginUsingId($userId);
        Session::flash('alert-success', 'Пользователь выбран');
        return redirect()->route('user-list');
    }

}
