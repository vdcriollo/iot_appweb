<?php

namespace Database\Seeders;

use App\Models\Spatie\Permission;
use App\Models\Spatie\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PermissionRoleUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        

        $permissions = ['Usuarios'];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::firstOrCreate(['name' => 'Administrador']);
        $roleAdmin->givePermissionTo(Permission::all());

        $user = User::firstOrCreate(
            ['email' => 'david.criollo14@gmail.com'], // condiciones de búsqueda
            [ 
                // atributos a crear si no existe
                'name' => 'Vilmer',
                'password' => Hash::make('david.criollo14@gmail.com'),
                'is_active' => true,
            ]
        );

        $user->assignRole($roleAdmin);
    }
}
