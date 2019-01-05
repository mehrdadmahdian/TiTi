<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::firstOrCreate([
            'name' => 'Admin'
        ]);
        $user = \App\User::create([
            'name' => 'مدیر',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        $permission = \Spatie\Permission\Models\Permission::firstOrCreate([
            'name' => 'admin-login'
        ]);

        $role->givePermissionTo($permission->name);
        $role->givePermissionTo('manage-users');
        $role->givePermissionTo('manage-roles');

        $user->syncRoles(['Admin']);

    }
}
