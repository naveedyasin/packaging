<?php

use App\Models\Module\SubModule;
use Illuminate\Database\Seeder;

class SubModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subModules = [
            [
                'name'        => 'All Posts',
                'module_id'   => 2,
                'route'  => 'admin.post.index',
                'position'    => 1,
                'is_active' => 1
            ],
            [
                'name'        => 'Add New',
                'module_id'   => 2,
                'route'  => 'admin.post.create',
                'position'    => 2,
                'is_active' => 1
            ],
            [
                'name'        => 'All Pages',
                'module_id'   => 5,
                'route'  => 'admin.page.index',
                'position'    => 1,
                'is_active' => 1
            ],
            [
                'name'        => 'Add New',
                'module_id'   => 5,
                'route'  => 'admin.page.create',
                'position'    => 2,
                'is_active' => 1
            ],
            [
                'name'        => 'All Emails',
                'module_id'   => 6,
                'route'  => 'admin.email.index',
                'position'    => 1,
                'is_active' => 1
            ],
            [
                'name'        => 'Add New',
                'module_id'   => 6,
                'route'  => 'admin.email.create',
                'position'    => 1,
                'is_active' => 1
            ],
            [
                'name'        => 'All Users',
                'module_id'   => 8,
                'route'  => 'admin.user.index',
                'position'    => 1,
                'is_active' => 1
            ],
            [
                'name'        => 'Add New',
                'module_id'   => 8,
                'route'  => 'admin.user.create',
                'position'    => 2,
                'is_active' => 1
            ],

        ];

        SubModule::insert($subModules);
    }
}
