<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTransaction()
    {
        //ambil data game account
        $transaksi = Transaksi::paginate(12);

        return view('transaksi_history', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        $UserID = 1;
        return view('create_transaksi', compact('UserID'));
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
        $tr->TransaksiID = $request->TransaksiID;
        $tr->GameAccountID = $request->GameAccountID;
        $tr->Method = $request->Method;
        $tr->UserID = $request->UserID;
        $tr->save();

        return redirect()->route('Transaksi History Page');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameAccount  $gameAccount
     * @return \Illuminate\Http\Response
     */
    public function showTransaction($id)
    {
        $tr = Transaksi::all()->find($id);

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
