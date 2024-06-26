<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function credit(User $user, int $amount)
    {
        $user->credit($amount);
        return response()->json($user);
    }

    public function debit(User $user, int $amount)
    {
        $user->debit($amount);
        return response()->json($user);
    }
}
