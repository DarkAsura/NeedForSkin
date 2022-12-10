<?php

namespace App\Http\Controllers;

use App\Models\TransaksiHistory;
use Illuminate\Http\Request;

class TransaksiHistoryController extends Controller
{
    public function viewTransaksiHistory($id)
    {

        $transaksiHistory = TransaksiHistory::all()->find($id);

        return view('view_transaksiHistory', compact('transaksiHistory'));

    }
}
