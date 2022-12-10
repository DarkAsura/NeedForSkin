<?php

namespace App\Http\Controllers;

use App\Models\GameType;
use Illuminate\Http\Request;

class GameTypeController extends Controller
{
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         //ambil data game account
//         $gameTypes = GameType::all()->find(id);

//         return view('home', compact('gameTypes'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     // public function create()
//     // {
//     //     $UserID = 1;
//     //     return view('buy_gameAccount', compact('UserID'));
//     // }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {

//         $gt = new GameType();
//         $gt->GameTypeID = $request->GameTypeID;
//         $gt->name = $request->name;
//         $ga->save();

//         //bisa disesuaikan
//         return redirect()->route('Home Page');

//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\GameAccount  $gameAccount
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $gt = GameType::all()->find($id);

//         //bisa disesuaikan
//         return view('view_gameTypes', compact('gt'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\GameAccount  $gameAccount
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $gt = GameType::all()->find($id);

//         return view('edit_gameType', compact('gt'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\GameAccount  $gameAccount
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $gt = GameType::all()->find($id);

//         $gt->GameTypeID = $request->GameTypeID;
//         $gt->name = $request->name;
//         $gt->save();

//         return redirect()->route('View User Profile', [$gt->UserID]);

//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\GameAccount  $gameAccount
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         GameType::destroy($id);
//         return redirect()->back();
//     }

// //     public function search(Request $request)
// //     {
// //         $query = $request->search;
// //         $search = $request->search;

// //         $gameAccounts = GameAccount::where('name', 'like', '%'.$search.'%')
// //                     ->orwhere('describes', 'like', '%'.$search.'%')
// //                     ->paginate(12);
// //         return view('home', compact('gameAccounts', 'query'));
// //     }
 }
