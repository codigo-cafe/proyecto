<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $this->middleware('guest')->except('logout');
    }
/*
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(
            Auth::attempt(array(
                'correo_usuario' => $credentials['email'],
                'password' => $credentials['password'],
            ))
        ){
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo);
        }
        return back()->withErrors([
            'email' => 'Las credenciales proveidas no coinciden con nuestros datos registrados'
        ]);
    }
    */
    protected function credentials(Request $request)
    {
        return ['correo_usuario' => $request->get('email'), 'password' => $request->get('password')];
    }
}
