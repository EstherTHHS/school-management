<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $adminList = Permission::create(['name' => 'adminList']);
        $adminCreate = Permission::create(['name' => 'adminCreate']);
        // $adminList = Permission::create(['name' => 'adminList']);
        // $adminList = Permission::create(['name' => 'adminList']);

        $admin->givePermissionTo([$adminList, $adminCreate]);
    }
}
