<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index() {

        if (Auth::user()) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function todoLogin(Request $request) {
        $remember_me = $request->has('remember') ? true : false;

        if (Auth::attempt($request->only('email', 'password'), $remember_me)) {

            toast('Welcome back!', 'success');
            return redirect()->route('dashboard.index');
        }

        return Redirect::back()->with('msg', 'Your Email or Password is not valid!');
    }

    public function logout(Request $request) {
        Auth::logout();

        Alert::success('Success', 'Success Logout!');
        return redirect()->route('login');

    }
}
