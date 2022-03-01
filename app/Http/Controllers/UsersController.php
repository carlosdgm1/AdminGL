<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {

        $idf = Auth::user()->fraccionamiento;
        $user = User::all()->where('fraccionamiento', $idf);
        $roles = Role::all();

        return view('Configuracion.usuarios', compact('user', 'roles', 'idf'));
    }

    public function crear(Request $request)
    {
        $idf = Auth::user()->fraccionamiento;

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request['password']),
            'fraccionamiento' =>  $request->idf,
        ]);

        return redirect()->back()->with('info', 'Usuario creado corrrectamente');
    }

    public function eliminar($id){

        $user= User::find($id);
        $user->delete();

        return redirect()->back()->with('info', 'Usuario eliminado');

    }

    public function updateRol(User $partner, Request $request)
    {

        $partner->roles()->sync($request->roles);

        return redirect()->back()->with('info', 'Se asignaron los roles correctamente');
    }
}
