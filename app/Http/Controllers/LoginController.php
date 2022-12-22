<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) == true){
            Cookie::queue(
                'loggedUser',
                Auth::user()->name,
                60
            );
            return redirect()->route('home-page');
        }else{
            return redirect()->back();
        };
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login-page');
    }

    public function addAccount(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required"
        ]);
        
        if($request->password != $request->confirm_password){
            return redirect()->route('register-page');
        }

        DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->route('login-page');
    }
}
