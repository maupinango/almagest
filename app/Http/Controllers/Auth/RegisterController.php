<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        $companies = Company::all(); // Trae todas las compañías
        return view('auth.register', compact('companies'));
    }

    protected function registered()
    {
    Auth::logout();
    return redirect()->route('login')->with('success', 'Usuario creado con éxito. ¡Verifica tu correo para usar tu cuenta!');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:15'],
            'secondname' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'company_id' => ['required', 'exists:companies,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
        'firstname' => $data['firstname'],
        'secondname' => $data['secondname'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'company_id' => $data['company_id'],
        'type' => 'u',
        'email_confirmed' => false,
        'activated' => false,
        'iscontact' => false,
        'deleted' => false,
    ]);
    }
}
