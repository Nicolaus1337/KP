<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {

        $SuperAdmin = User::create([
            'npk' => 'K1',
            'name' => 'Nicolaus Ardy',
            'unit_kerja' => 'Tim Transformasi Digital',
            'email' => 'SuperAdmin@gmail.com',
            'password' => Hash::make('12345678')

        ]);

        $admin_UnitKerja = User::create([
            'npk' => 'K2',
            'name' => 'Ihsan ',
            'unit_kerja' => 'Departemen IT Service & Business Partner PKT',
            'email' => 'UnitKerja@gmail.com',
            'password' => Hash::make('12345678')

        ]);


        
        $admin_DataUser = User::create([
            'npk' => 'K3',
            'name' => 'Desca',
            'unit_kerja' => 'Tim Transformasi Digital',
            'email' => 'DataUser@gmail.com',
            'password' => Hash::make('12345678')
        ]);


        $admin_RolePerm = User::create([
            'npk' => 'K4',
            'name' => 'Alamsyah',
            'unit_kerja' => 'Departemen IT Service & Business Partner PKT',
            'email' => 'RolePermission@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $admin_Content = User::create([
            'npk' => 'K5',
            'name' => 'Ardhian',
            'unit_kerja' => 'Tim Transformasi Digital',
            'email' => 'Content@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'npk' => 'K6',
            'name' => 'Nico',
            'unit_kerja' => 'Departemen IT Service & Business Partner PKT',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678')
        ]);


        $role_SuperAdmin = Role::create([
            'name' => 'super admin',
        ]);
        $role_AdminUnitKerja = Role::create([
            'name' => 'admin unit kerja',
        ]);
        $role_AdminDataUser = Role::create([
            'name' => 'admin data user',
        ]);
        $role_AdminRolePerm = Role::create([
            'name' => 'admin role permission',
        ]);
        $role_AdminKonten = Role::create([
            'name' => 'admin konten',
        ]);


        $role_user = Role::create([
            'name' => 'user',
        ]);



        $permission = Permission::create([
            'name' => "create data unit kerja"
        ]);
        $permission = Permission::create([
            'name' => "read data unit kerja"
        ]);
        $permission = Permission::create([
            'name' => "update data unit kerja"
        ]);
        $permission = Permission::create([
            'name' => "delete data unit kerja"
        ]);


        $permission = Permission::create([
            'name' => "create data user"
        ]);
        $permission = Permission::create([
            'name' => "read data user"
        ]);
        $permission = Permission::create([
            'name' => "update data user"
        ]);
        $permission = Permission::create([
            'name' => "delete data user"
        ]);

        $permission = Permission::create([
            'name' => "create role"
        ]);
        $permission = Permission::create([
            'name' => "read role"
        ]);
        $permission = Permission::create([
            'name' => "update role"
        ]);
        $permission = Permission::create([
            'name' => "delete role"
        ]);
        $permission = Permission::create([
            'name' => "assign role"
        ]);

        $permission = Permission::create([
            'name' => "create permission"
        ]);
        $permission = Permission::create([
            'name' => "read permission"
        ]);
        $permission = Permission::create([
            'name' => "update permission"
        ]);
        $permission = Permission::create([
            'name' => "delete permission"
        ]);
        $permission = Permission::create([
            'name' => "assign permission"
        ]);

        $permission = Permission::create([
            'name' => "create content"
        ]);
        $permission = Permission::create([
            'name' => "read content"
        ]);
        $permission = Permission::create([
            'name' => "update content"
        ]);
        $permission = Permission::create([
            'name' => "delete content"
        ]);

        $permission = Permission::create([
            'name' => "create onboarding"
        ]);
        $permission = Permission::create([
            'name' => "read onboarding"
        ]);
        $permission = Permission::create([
            'name' => "update onboarding"
        ]);
        $permission = Permission::create([
            'name' => "delete onboarding"
        ]);

        $permission = Permission::create([
            'name' => "create guide"
        ]);
        $permission = Permission::create([
            'name' => "read guide"
        ]);
        $permission = Permission::create([
            'name' => "update guide"
        ]);
        $permission = Permission::create([
            'name' => "delete guide"
        ]);

        $permission = Permission::create([
            'name' => "home"
        ]);

        


        $SuperAdmin->assignRole('super admin');
        $admin_UnitKerja->assignRole('admin unit kerja');
        $admin_DataUser->assignRole('admin data user');
        $admin_RolePerm->assignRole('admin role permission');
        $admin_Content->assignRole('admin konten');
        $user->assignRole('user');

    
        $role_SuperAdmin->givePermissionTo([
            "create data unit kerja",
            "read data unit kerja",
            "update data unit kerja",
            "delete data unit kerja",
            "create data user",
            "read data user",
            "update data user",
            "delete data user",
            "create role",
            "read role",
            "update role",
            "delete role",
            "assign role",
            "create permission",
            "read permission",
            "update permission",
            "delete permission",
            "assign permission",
            "create content",
            "read content",
            "update content",
            "delete content",
            "create onboarding",
            "read onboarding",
            "update onboarding",
            "delete onboarding",
            "create guide",
            "read guide",
            "update guide",
            "delete guide",
            "home"
            
            
        ]);

        $role_AdminUnitKerja->givePermissionTo([
            "create data unit kerja",
            "read data unit kerja",
            "update data unit kerja",
            "delete data unit kerja"
        ]);

        $role_AdminDataUser->givePermissionTo([
            "create data user",
            "read data user",
            "update data user",
            "delete data user"
        ]);

        $role_AdminRolePerm->givePermissionTo([
            "create role",
            "read role",
            "update role",
            "delete role",
            "assign role",
            "create permission",
            "read permission",
            "update permission",
            "delete permission",
            "assign permission"
        ]);

        $role_AdminKonten->givePermissionTo([
            "create content",
            "read content",
            "update content",
            "delete content",
            "create onboarding",
            "read onboarding",
            "update onboarding",
            "delete onboarding",
            "create guide",
            "read guide",
            "update guide",
            "delete guide"
        ]);

        $role_user->givePermissionTo([
           
            'home',
            "read guide",
            "read onboarding"
        ]);
    }
}
