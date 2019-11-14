<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = 'admins/home';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin/auth/login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /*Another */

    /*
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected $redirectTo = 'admins/home';

    public function showLoginForm()
    {
        return view('admin/auth/login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('admins/home');
        };

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    */
}
