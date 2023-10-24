<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'User',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user3 = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user1 = User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $userRole = Role::create(['name' => 'Default']);

        $cashier = Role::create(['name' => 'cashier']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $admin = Role::create(['name' => 'admin']);

        $make_sales = Permission::create(['name' => 'make-sales']);
        $record_payments = Permission::create(['name' => 'record-payments']);
        $create = Permission::create(['name' => 'create']);
        $delete = Permission::create(['name' => 'delete']);
        $manage = Permission::create(['name' => 'manage']);
        $manage_users = Permission::create(['name' => 'manage-users']);

        $cashier->givePermissionTo($make_sales);
        $cashier->givePermissionTo($record_payments);

        // Supervisor has all cashier permissions, so we assign the permissions of the 'cashier' role to the 'supervisor' role.
        $supervisor->syncPermissions([
            $make_sales,
            $record_payments,
        ]);

        $supervisor->givePermissionTo($create);
        $supervisor->givePermissionTo($delete);
        $supervisor->givePermissionTo($manage);

        // Admin has all supervisor permissions, so we assign the permissions of the 'supervisor' role to the 'admin' role.
        $admin->syncPermissions([
            $make_sales,
            $record_payments,
            $create,
            $delete,
            $manage,
        ]);

        $admin->givePermissionTo($manage_users);

        $user3->assignRole($cashier);
        $user1->assignRole($supervisor);
        $user2->assignRole($admin);
        $user->assignRole($userRole);
    }
}

