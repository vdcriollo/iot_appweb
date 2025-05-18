<?php

namespace App\Http\Controllers;

use App\Models\Spatie\Permission;
use App\Models\Spatie\Role;
use Illuminate\Http\Request;

class RolPermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'roles'=>Role::get(),
            'permisos'=>Permission::get()
        );
        return view('rol-permisos.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles,name'
        ]);
        
        $role = Role::create(['name' => $request->name]);
        return redirect()->route('rol-permisos.index')->with('success','Rol creado.!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function actualizarPermisosRol(Request $request, $id) {
        $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ], [
            'permissions.*.exists' => 'Uno de los permisos seleccionados no existe.',
        ]);

        $role = Role::findOrFail($id);
        
        $permissions = $request->input('permissions', []); // array vacío si no hay checkboxes marcados

        $role->syncPermissions($permissions);

        return back()->with('success', 'Permisos actualizados correctamente.');
    }
}
