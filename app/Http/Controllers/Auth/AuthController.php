<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
    	return view('backend.user.login');
    }
    public function login(Request $request)
    {
    	$username = trim($request->username);
    	$password = trim($request->password);

    	if  (Auth::attempt(['username' => $username, 'password' => $password])) {
    		return redirect()->route('backend.home.index');
    	}else{
    		$request->session()->flash('msgDanger', 'Sai username hoặc mật khẩu');
    		return redirect()->route('login');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('backend.auth.login');
    }
}
