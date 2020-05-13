<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permissions;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::paginate();
        return view('users/index',compact('users'));
    }


    public function show(User $user)
    {
        //dd($user->id); //para verificar si esta llegando el dato de la vista
        return view('users.show',compact('user')); 
    }

    public function edit(User $user)
    {
        $roles=Role::get();
        return view('users.edit',compact('user','roles')); 
    }

    public function update(Request $request, User $user)
    {
        //actualizar usuario
        $user->update($request->all());

        //Actualizar Roles
        $user->users()->sync($request->get('roles'));

        return redirect()->route('users.edit',$user->id)
            ->with('info','Usuario actualizado con exito');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info','Eliminado correctamente');
    }
}
