<?php

namespace App\Http\Controllers;

use App\Models\GameAccount;
use App\Models\Transaksi;
use App\Models\TransaksiHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTransaction($id)
    {
        //ambil data game account
        // $transaksi = TransaksiHistory::where('UserId','=',$id)->paginate(12);

        // $TransaksiHistory = TransaksiHistory::query()->where('UserId', $id)->get();

        $transaksi = DB::table('transaksi_histories')
        ->select('*','types.name as GameName','game_accounts.name as name')
        ->join('transaksis','transaksi_histories.TransaksiID','=','transaksis.TransaksiID')
        ->join('game_accounts','transaksis.GameAccountID','=','game_accounts.GameAccountID')
        ->join('game_types','game_accounts.GameAccountID','=','game_types.GameAccountID')
        ->join('types','game_types.GameType','=','types.TypeID')
        ->where(['transaksi_histories.UserID' => $id])
        ->get();

        return view('transaksi_history', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction(GameAccount $gameAccount)
    {
        return view('create_transaksi', ['gameAccount' => $gameAccount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTransaction(Request $request)
    {
        $tr = new Transaksi();
        $tr->GameAccountID = $request->GameAccountID;
        $tr->Method = $request->Method;
        $tr->UserID = $request->UserID;
        $tr->save();

        $trh = new TransaksiHistory();
        $trh->UserID = $request->user_id;
        $trh->TransaksiID = $tr->TransaksiID;
        $trh->save();

        $gameAccount = GameAccount::all()->find($tr->GameAccountID);
        $gameAccount->UserID = $trh->UserID;
        $gameAccount->save();

        return redirect()->route('Transaksi History Page',['id' => $trh->UserID]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function showTransaction($id)
    {
        $tr = DB::table('transaksis')
        ->select('*','types.name as GameName','game_accounts.name as name')
        ->join('transaksi_histories','transaksis.TransaksiID','=','transaksi_histories.TransaksiID')
        ->join('game_accounts','transaksis.GameAccountID','=','game_accounts.GameAccountID')
        ->join('game_types','game_accounts.GameAccountID','=','game_types.GameAccountID')
        ->join('types','game_types.GameType','=','types.TypeID')
        ->where(['transaksis.TransaksiID' => $id])
        ->get();
        // dd($tr);
        return view('view_transaksiHistory', compact('tr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function editTransaction($id)
    {
        $tr = Transaksi::all()->find($id);

        return view('edit_transaksi', compact('tr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function updateTransaction(Request $request, $id)
    {
        $tr = Transaksi::all()->find($id);

        $tr->TransaksiID = $request->TransaksiID;
        $tr->GameAccountID = $request->GameAccountID;
        $tr->Method = $request->Method;
        $tr->UserID = $request->UserID;
        $tr->save();

        return redirect()->route('View Transaksi History', [$tr->TransaksiID]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function destroyTransaction($id)
    {
        Transaksi::destroy($id);
        return redirect()->back();
    }

    public function searchTransaction(Request $request)
    {
        $query = $request->search;
        $search = $request->search;

        $transaksi = Transaksi::where('TransaksiID', 'like', '%'.$search.'%')
                    ->orwhere('Method', 'like', '%'.$search.'%')
                    ->paginate(12);
        return view('transaksi_history', compact('transaksi', 'query'));
    }
}
