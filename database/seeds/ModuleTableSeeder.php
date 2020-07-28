<?php

use App\Models\Module\Module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name'        => 'Dashboard',
                'route_name'  => 'admin.dashboard',
                'position'    => 1,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Posts',
                'route_name'  => 'admin.post.index',
                'position'    => 2,
                'icon'       => '<i class="icon-file-check2"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Categories',
                'route_name'  => 'admin.category.index',
                'position'    => 3,
                'icon'       => '<i class="icon-tree5"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Tags',
                'route_name'  => 'admin.tag.index',
                'position'    => 4,
                'icon'       => '<i class="icon-price-tag"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Pages',
                'route_name'  => 'admin.page.index',
                'position'    => 5,
                'icon'       => '<i class="icon-file-check"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Emails',
                'route_name'  => 'admin.email.index',
                'position'    => 6,
                'icon'       => '<i class="icon-envelop"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Access',
                'route_name'  => '',
                'position'    => 7,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Users',
                'route_name'  => 'admin.user.index',
                'position'    => 8,
                'icon'       => '<i class="icon-users"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Settings',
                'route_name'  => 'admin.settings',
                'position'    => 9,
                'icon'       => '<i class="icon-cog"></i>',
                'is_active' => 1
            ],

        ];

        Module::insert($modules);
    }
}
