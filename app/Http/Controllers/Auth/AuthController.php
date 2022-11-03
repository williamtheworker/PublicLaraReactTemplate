<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

    public function login () {
        if(Auth::user()) {
            return redirect('dashboard');
        } else {
            return view('/auth/login');
        }
    }

    public function authenticate (Request $request) {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $authentication = array('status' => 'success', 'message' => 'success');
        } else {
            $authentication = array('status' => 'failed', 'message' => 'The provided credentials do not match out records.');
        }
        
        return json_encode($authentication);

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match out records.'
        // ]);
    }

    public function logout (Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}