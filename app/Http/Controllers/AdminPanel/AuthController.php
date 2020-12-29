<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;

class AuthController extends Controller
{
    public function login()
    {
    	return view('adminPanel.auth.login');
    }

    public function postLogin(Request $request)
    {
    	$credentials = $request->validate([
    		'email' => 'required|email',
    		'password' => 'required',
    	]);

    	if (auth('admin')->attempt($credentials)) {
    		return redirect(route('adminPanel.dashboard'));
    	}

    	Flash::error(__('auth.failed'));
    	return back();
	}
	
    // public function register(Request $request)
    // {
    // 	return view('adminPanel.auth.register');
	// }
	
    // public function postRegister(Request $request)
    // {
    // 	$credentials = $request->validate([
    // 		'email' => 'required|email',
    // 		'password' => 'required',
    // 	]);

    // 	if (auth('admin')->attempt($credentials)) {
    // 		return redirect(route('adminPanel.dashboard'));
    // 	}

    // 	Flash::error(__('auth.failed'));
    // 	return back();
    // }

    public function logout()
    {
    	auth('admin')->logout();

    	return redirect(route('adminPanel.login'));
    }
}
