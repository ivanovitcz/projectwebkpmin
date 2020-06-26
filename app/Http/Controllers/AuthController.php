<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login() {
      if (Auth::check()) {
        return redirect('/');
      }
      
      return view('login');
    }

    public function logout() {
      Auth::logout();
      return redirect('/login');
    }

    public function postlogin(Request $request) {
      if(Auth::attempt($request -> only('name','password'))) {
        return redirect('/');
      } else {
        return redirect('/login') -> with('error','Gagal Login!');;
      }
    }
}
