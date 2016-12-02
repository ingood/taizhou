<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => '管理员',
            'slug' => 'admin',
            'description' => '管理员',
            'level' => 1,
        ]);
        $xmfzr = Role::create([
            'name' => '项目负责人',
            'slug' => 'xmfzr',
            'description' => '项目负责人',
            'level' => 2,
        ]);
        $bmzz = Role::create([
            'name' => '部门专职',
            'slug' => 'bmzz',
            'description' => '部门专职',
            'level' => 3,
        ]);
        $kjzz = Role::create([
            'name' => '科技专职',
            'slug' => 'kjzz',
            'description' => '科技专职',
            'level' => 4,
        ]);
        $zj = Role::create([
            'name' => '专家',
            'slug' => 'zj',
            'description' => '专家',
            'level' => 5,
        ]);

        \App\User::where('username','admin')->first()->attachRole($admin);
        if(App::environment('local')) {
            \App\User::where('username','user1')->first()->attachRole($xmfzr);
            \App\User::where('username','user2')->first()->attachRole($bmzz);
            \App\User::where('username','user3')->first()->attachRole($kjzz);
            \App\User::where('username','user4')->first()->attachRole($zj);
        }
    }
}
