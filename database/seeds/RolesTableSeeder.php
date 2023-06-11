<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->rolename = 'sysadmin';
        $role->description = 'Administrator';
        $role->save();
        $role = new Role();
        $role->rolename = 'dba';
        $role->description = 'Database Administrator';
        $role->save();
        $role = new Role();
        $role->rolename = 'director';
        $role->description = 'Director/Leader';
        $role->save();
        $role = new Role();
        $role->rolename = 'supervisor';
        $role->description = 'Supervisor';
        $role->save();
        $role = new Role();
        $role->rolename = 'digitador';
        $role->description = 'Digitador';
        $role->save();
        $role = new Role();
        $role->rolename = 'user';
        $role->description = 'User';
        $role->save();
    }
}
