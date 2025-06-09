<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Spatie\Role;
use App\Models\User;
use App\Rules\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'roles'=>Role::get()
        );
        return view('users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->filled('roles')) {
            $user->assignRole($request->roles); // Spatie acepta array de nombres
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
        
    }   

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Role::all();

        return view('users.edit', [
            'usuario' => $usuario,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, User $usuario)
    {

        // Actualizar datos básicos
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        // Si se envió password, actualizarlo
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        // Actualizar roles (reemplazar roles actuales)
        if ($request->has('roles')) {
            $usuario->syncRoles($request->roles);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
  
    public function destroy(User $usuario)
    {
        
        DB::beginTransaction();

        try {
            // Revoca roles y permisos (opcional, depende de tu necesidad)
            $usuario->syncRoles([]);
            $usuario->syncPermissions([]);

            // Elimina el usuario
            $usuario->delete();
            
            DB::commit();

            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('danger', 'Ocurrió un error al intentar eliminar el usuario.');
        }
    }


}
