<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GameAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewUser($id)
    {
        $User = User::where('id','=',$id)->first();
        $GameAccounts = GameAccount::where('UserId','=',$id)->paginate(12);

        return view('view_user', ['user' => $User, 'gameAccounts' => $GameAccounts]);
    }

    public function login(Request $request){
        //INSERT CODE HERE
        $credenial = $request->validate([
            'email'=>'required|email',
            'password' => 'required|min:8|max:20'
        ]);
        if (!Auth::attempt($credenial, $request->input('remember'))){
            return redirect()->back()->withErrors('Invalid Credential');
        }
        return redirect()->route('Home Page');
    }

    public function index_login(){
        //INSERT CODE HERE
        return view('auth.login');
    }

    public function index_register(){
        //INSERT CODE HERE
        return view('auth.register');
    }

    public function register(Request $request){
        //INSERT CODE HERE
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required|min:8|max:20',
            'confirm' => 'required|same:password',
            'terms' => 'required'
        ]);

        //create new user
        $newUser = new User();
        $newUser->Name = $request->name;
        $newUser->Email=$request->email;
        $newUser->Password=Hash::make($request->password);
        $newUser->Role = 'Member';
        $newUser->save();

        return redirect()->route('index_login');
    }

    //A Function To Handle Logout
    public function logout(){
        //INSERT CODE HERE
        Auth::logout();
        return redirect()->route('index_login');
    }


}

