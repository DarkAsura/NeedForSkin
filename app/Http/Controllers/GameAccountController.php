<?php

namespace App\Http\Controllers;

use App\Models\GameAccount;
use App\Models\GameType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGameAccount()
    {
        //ambil data game account

        $gameAccounts = DB::table('game_accounts')
        ->select('*','types.name as GameName','game_accounts.name as name')
        ->join('game_types','game_accounts.GameAccountID','=','game_types.GameAccountID')
        ->join('types','game_types.GameType','=','types.TypeID')
        ->simplePaginate(12);


        return view('home', compact('gameAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sellGameAccount()
    {
        $UserID = 1;
        return view('input_gameAccount', compact('UserID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGameAccount(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'GameType' => 'required',
            'describes' => 'bail|required|min:10|max:100',
             'price' => 'bail|required|numeric|gt:1000',
         ]);

        if ($validate) {

            if($request->GameType == 1){
                $fileName = 'https://drive.google.com/thumbnail?id=1lLAsBFzOGSTNtnjcuoLWVvpOv59kpluY';
            }else if($request->GameType == 2){
                $fileName = 'https://drive.google.com/thumbnail?id=13iynboeEGsz3H5SjYTkrmRhIo6P146zB';
            }else if($request->GameType == 3){
                $fileName = 'https://drive.google.com/thumbnail?id=1IbgX7_8dPuDisxjfk5EEqPV6dncAI-s3';
            }else if ($request->GameType == 4){
                $fileName = 'https://drive.google.com/thumbnail?id=1S9vWjzfP6L-zXa3gyAPIM3DIC-jtzt3k';
            }else{
                $fileName = 'https://drive.google.com/thumbnail?id=1UIDGVYdMqdFj-BOlS9vRZPBUPzNuKqxF';
            }

            $ga = new GameAccount();
            $ga->UserID = $request->user_id;
            $ga->name = $request->name;
            $ga->image = $fileName;
            $ga->describes = $request->describes;
            $ga->price = $request->price;
            $ga->save();

            $gt = new GameType();
            $gt->GameType = $request->GameType;
            $gt->GameAccountID = $ga->GameAccountID;
            $gt->save();
            return redirect()->route('Home Page');
        }
        return redirect()->route('Buat Game Account')->withErrors($validate, 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function showGameAccount($id)
    {
        $ga = GameAccount::all()->find($id);

        return view('view_gameAccount', compact('ga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function editGameAccount($id)
    {
        $ga = GameAccount::all()->find($id);

        return view('edit_gameAccount', compact('ga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function updateGameAccount(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'GameType' => 'required',
            'describes' => 'bail|required|min:10|max:100',
             'price' => 'bail|required|numeric|gt:1000',
         ]);
        if ($validate) {
            if($request->GameType == 1){
                $fileName = 'https://drive.google.com/thumbnail?id=1lLAsBFzOGSTNtnjcuoLWVvpOv59kpluY';
            }else if($request->GameType == 2){
                $fileName = 'https://drive.google.com/thumbnail?id=13iynboeEGsz3H5SjYTkrmRhIo6P146zB';
            }else if($request->GameType == 3){
                $fileName = 'https://drive.google.com/thumbnail?id=1IbgX7_8dPuDisxjfk5EEqPV6dncAI-s3';
            }else if ($request->GameType == 4){
                $fileName = 'https://drive.google.com/thumbnail?id=1S9vWjzfP6L-zXa3gyAPIM3DIC-jtzt3k';
            }else{
                $fileName = 'https://drive.google.com/thumbnail?id=1UIDGVYdMqdFj-BOlS9vRZPBUPzNuKqxF';
            }
            $ga = GameAccount::find($id);
            $ga->UserID = $request->user_id;
            $ga->name = $request->name;
            $ga->image = $fileName;
            $ga->describes = $request->describes;
            $ga->price = $request->price;
            $ga->save();

            DB::table('game_types')
            ->where('game_types.GameAccountID', '=', $id)
            ->update([
                'GameType' => $request->GameType
            ]);
            return redirect()->route('Home Page');
        }
        return redirect()->route('Edit Game Account Page')->withErrors($validate, 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function destroyGameAccount($id)
    {
        DB::table('game_types')
            ->where('game_types.GameAccountID', '=', $id)
            ->delete();

        return redirect()->route('Home Page');
    }

    public function searchGameAccount(Request $request)
    {
        $query = $request->search;
        $search = $request->search;

        $gameAccounts = DB::table('game_accounts')
        ->select('*','types.name as GameName','game_accounts.name as name')
        ->join('game_types','game_accounts.GameAccountID','=','game_types.GameAccountID')
        ->join('types','game_types.GameType','=','types.TypeID')
        ->where('game_accounts.name', 'like', '%'.$search.'%')
        ->orwhere('describes', 'like', '%'.$search.'%')
        ->simplePaginate(12);

        return view('home', compact('gameAccounts', 'query'));
    }

    public function getGameAccountDetail(GameAccount $gameAccount){

        $ga = DB::table('game_accounts')
        ->select('*','types.name as GameName','game_accounts.name as name')
        ->join('game_types','game_accounts.GameAccountID','=','game_types.GameAccountID')
        ->join('types','game_types.GameType','=','types.TypeID')
        ->where(['game_accounts.GameAccountID' => $gameAccount->GameAccountID])
        ->get();

        return view('view_gameAccount', ['ga' => $ga]);
    }
}
