<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

/**************************************************
************** CLASE PARA LOGIN DE LA WEB *********
**************************************************/

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
     * Funcion que permite cambiar el campo por el que se loguea el usuario
     * 
     * @return string
     */
    public function username()
    {
        return 'user';
    }

    public function authenticated(Request $request)
    {        
        if (Auth::attempt(['user' => $request->user, 'password' => $request->password, 'externo' => 0])) {
            
        }else{
            Auth::logout();
        }
    }
}
