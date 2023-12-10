<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_patient = Role::create(['name' => 'patient']);

        $manage_appointment   = Permission::create (['name' =>'manage_appointment']);
        $manage_service = Permission::create (['name' => 'manage_service']);
        $manage_patient = Permission::create (['name'=> 'manage_patient']);
        $add_appointment = Permission::create (['name'=> 'add_appointment']);
        $manage_logs = Permission::create (['name'=> 'manage_logs']);


        $permission_admin = [$manage_appointment,$manage_service, $manage_patient, $manage_logs];
        $permission_patient = [$add_appointment];


        $role_admin->syncPermissions($permission_admin);
        $role_patient->syncPermissions($permission_patient);


        User::find(1)->assignRole($role_admin);
        User::find(2)->assignRole($role_patient);
    }
}
