<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::where('deleted', 0)->where('email', '!=', 'admin@admin.com')->orderBy('id', 'desc')->get();
        return view('admin/users/index', ['usuarios' => $usuarios]);
    }

    public function activate($id)
    {
        $user = User::findOrfail($id);

        if($user->email_confirmed)
        {
            $user->activated = true;
            $user->save();

            return redirect()->route('users.index')->with('success', 'Usuario activado correctamente');
        }

        return redirect()->route('users.index')->with('error', 'El usuario debe confirmar email primero');
    }

    public function desactivate($id)
    {
        $user = User::findOrFail($id);
        $user->activated = false;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario desactivado correctamente');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['usuario' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'firstname' => 'required|string|max:15',
            'secondname' => 'required|string|max:50',
            'email' => 'required|email|max:40|unique:users,email,' . $id,
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = 1;  //soft delete
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }

}

?>