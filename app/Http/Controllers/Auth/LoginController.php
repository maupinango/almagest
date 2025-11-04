<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->email_confirmed) {
              auth()->logout();
              return redirect()->route('login')
            ->with('warning', 'Tu correo no ha sido verificado. Por favor revise su correo electronico.');
        }

        if (!$user->activated) {
              auth()->logout();
              return redirect()->route('login')
            ->with('warning', 'El administrador aún no ha activado tu cuenta. ¡Se paciente!');
        }

}

}
