<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permissions;

use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles=Role::paginate();
        return view('roles/index',compact('roles'));
    }

    public function create()
    {
       return view('roles.create');
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return redirect()->route('roles.edit',$role->id)
            ->with('info','Producto guardado con exito');
    }
    public function show(Role $role)
    {
        //dd($role->id); //para verificar si esta llegando el dato de la vista
        return view('roles.show',compact('role')); 
    }

    public function edit(Role $role)
    {
        $roles=Role::get();
        return view('roles.edit',compact('role','roles')); 
    }

    public function update(Request $request, Role $role)
    {
        //actualizar usuario
        $role->update($request->all());

        //Actualizar Roles
        $role->roles()->sync($request->get('roles'));

        return redirect()->route('roles.edit',$role->id)
            ->with('info','Usuario actualizado con exito');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('info','Eliminado correctamente');
    }
}
