<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

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
        $permissions=Permission::get();

        return view('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit',$role->id)
            ->with('info','Rol guardado con exito');
    }
    public function show(Role $role)
    {
        //dd($role->id); //para verificar si esta llegando el dato de la vista
        return view('roles.show',compact('role')); 
    }

    public function edit(Role $role)
    {
        $permissions=Permission::get();
        return view('roles.edit',compact('role','permissions')); 
    }

    public function update(Request $request, Role $role)
    {
        //actualizar Rol
        $role->update($request->all());

        //Actualizar Permisos
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.edit',$role->id)
            ->with('info','Rol actualizado con exito');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('info','Eliminado correctamente');
    }
}
