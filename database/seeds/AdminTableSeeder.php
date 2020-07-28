<?php

use App\Models\Admin\Admin;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::where('name', '=', 'User')->first();
        $adminRole = Role::where('name', '=', 'Admin')->first();
        $permissions = Permission::all();

        /*
         * Add Users
         *
         */
        if (Admin::where('email', '=', 'admin@admin.com')->first(
            ) === null) {
            $newUser = Admin::create(
                [
                    'first_name' => 'imran',
                    'last_name' => 'Ali',
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('password'),
                ]
            );

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (Admin::where('email', '=', 'user@user.com')->first(
            ) === null) {
            $newUser = Admin::create(
                [
                    'first_name' => 'test',
                    'last_name' => 'user',
                    'name' => 'User',
                    'email' => 'user@user.com',
                    'password' => bcrypt('password'),
                ]
            );

            $newUser->attachRole($userRole);
        }
    }
}
