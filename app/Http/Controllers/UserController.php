<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameAccount;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUser($id)
    {

        $User = User::all()->find($id);
        $GameAccounts = [];

        foreach($User as $user){
            array_push($GameAccounts, GameAccount::query()->where('UserID', $user->GameAccountID)->first());
        }

        
        return view('view_user', ['user' => $user, 'gameAccounts' => $GameAccounts]);

    } 
}
