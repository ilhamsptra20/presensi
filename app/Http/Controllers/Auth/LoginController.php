<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm()
    {
        return view('welcome');
    }

    protected function Login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->intended(route('dashboard'));
        }

        elseif(Auth::guard('student')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->intended(route('student'));
        }

        return redirect('/')
        ->withInput($request->only('email', 'remember'))
        ->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    
}
