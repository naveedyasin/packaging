<?php

use App\Models\Permission\Permission;
use App\Models\Role\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissionitems = [
            [
                'name' => 'Can View Users',
                'slug' => 'view.users',
                'description' => 'Can view users',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Create Users',
                'slug' => 'create.users',
                'description' => 'Can create new users',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Edit Users',
                'slug' => 'edit.users',
                'description' => 'Can edit users',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Delete Users',
                'slug' => 'delete.users',
                'description' => 'Can delete users',
                'model' => 'Permission',
            ],
        ];

        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = Permission::where(
                'slug',
                '=',
                $Permissionitem['slug']
            )->first();
            if ($newPermissionitem === null) {
                Permission::create(
                    [
                        'name' => $Permissionitem['name'],
                        'slug' => $Permissionitem['slug'],
                        'description' => $Permissionitem['description'],
                        'model' => $Permissionitem['model'],
                    ]
                );
            }
        }
    }
}
