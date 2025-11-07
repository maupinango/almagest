<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = User::where('deleted', 0)->where('email_confirmed', 1)->where('email', '!=', 'admin@admin.com')->orderBy('id', 'desc')->get()->count();
        return view('home', ['usuariosCant' => $usuarios]);

        return view('');
    }
}
