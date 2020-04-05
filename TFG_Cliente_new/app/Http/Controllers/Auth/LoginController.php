<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function login(Request $request)
    {

       try {

            $client = new \GuzzleHttp\Client();
            
            $resLogIN = $client->post(env("URL_API").'/api/login', [
                                        'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                                        'form_params' => [
                                            'user' => $request->user,
                                            'password' => $request->password
                                        ]
                                ]);
            
            $respuesta = json_decode($resLogIN->getBody());
            
            session()->put('token_api', $respuesta->token);

            $resUser = $client->get(env("URL_API").'/api/user', [
                                'headers' => ['Content-Type' => 'application/json',
                                              'Authorization' => 'Bearer '.session()->get('token_api')]
                        ]);
            
            $respuestaUser = json_decode($resUser->getBody());

            // session()->put('user_name', $respuestaUser->name);
            // session()->put('user', $respuestaUser->user);
            // session()->put('email', $respuestaUser->email);
            // session()->put('rfid_tag', $respuestaUser->rfid_tag);
            // session()->put('pin', $respuestaUser->pin);
            
        }catch (\GuzzleHttp\Exception\ClientException $e) {
            
            $res = $e->getResponse();
            $respuesta = json_decode($res->getBody());
            throw ValidationException::withMessages([
                $this->username() => 'Los datos introducidos no son correctos.',
            ]);
        
        }
        
        return redirect('/');
    }
}
