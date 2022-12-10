<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\GameType;
use App\Models\GameAccount;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getType(Type $type){
        $GameType = GameType::query()->where('GameType', $type->TypeID)->get();
        $GameAccounts = [];

        foreach($GameType as $gameType){
            array_push($GameAccounts, GameAccount::query()->where('GameAccountID', $gameType->GameAccountID)->first());
        }
        return view('type', ['type' => $type, 'gameAccounts' => $GameAccounts]);
    } 
}


