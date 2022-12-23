<?php

namespace App\Http\Controllers;

use App\Models\GameAccount;
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

        $gameAccounts = GameAccount::simplePaginate(12);


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

        $ga = new GameAccount();
        $ga->GameAccountID = $request->GameAccountID;
        $ga->UserID = $request->UserID;
        $ga->name = $request->name;
        $ga->image = $request->image;
        $ga->describes = $request->describes;
        $ga->price = $request->price;
        $ga->save();

        return redirect()->route('Home Page');

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
        $ga = GameAccount::all()->find($id);

        $ga->GameAccountID = $request->GameAccountID;
        $ga->UserID = $request->UserID;
        $ga->name = $request->name;
        $ga->image = $request->image;
        $ga->describes = $request->describes;
        $ga->price = $request->price;
        $ga->save();

        return redirect()->route('View Game Account', [$ga->GameAccountID]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function destroyGameAccount($id)
    {
        GameAccount::destroy($id);
        return redirect()->back();
    }

    public function searchGameAccount(Request $request)
    {
        $query = $request->search;
        $search = $request->search;

        $gameAccounts = GameAccount::where('name', 'like', '%'.$search.'%')
                    ->orwhere('describes', 'like', '%'.$search.'%')
                    ->paginate(12);
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
