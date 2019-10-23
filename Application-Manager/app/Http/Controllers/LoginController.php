<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return Response|string
     */
    public function login()
    {
        $remember = (request('remember') == "on");
        $email = request("email");
        $password = request("password");

        if (Auth::attempt(["email" => $email, "password" => $password], $remember)) {
            return [
                'code' => 'OK',
                'url' => '/home'
            ];
        } else {
            return [
                'code' => 'DENIED',
                'msg' => 'These credentials are not recognized.' 
            ];
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
