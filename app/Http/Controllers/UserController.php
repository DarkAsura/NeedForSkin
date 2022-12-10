<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewUser($id)
    {
        $User = User::where('UserId','=',$id)->first();
        $GameAccounts = GameAccount::where('UserID','=',$id)->get();

        return view('view_user', ['user' => $User, 'gameAccounts' => $GameAccounts]);

    }
}

