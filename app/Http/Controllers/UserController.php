<?php

use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        //verificar autenticacion
    }

    public function index()
    {
        $usuarios = User::orderBy('id', 'desc')->get();
        return view('admin/users/index', ['usuarios' => $usuarios]);
    }

}

?>