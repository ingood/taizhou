<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = env('ADMIN_PASSWORD', '123456');
        $users = [['name' => '管理员', 'username' => env('ADMIN_NAME'), 'password' => bcrypt($password)]]  ;

        //测试环境下添加测试用户
        if(App::environment('local')) {
            //测试用户
            $testUsers = [
                ['name' => '用户1', 'username' => 'user1', 'corporation_id' => 2, 'password' => bcrypt($password)],
                ['name' => '用户2', 'username' => 'user2', 'corporation_id' => 2, 'password' => bcrypt($password)],
                ['name' => '用户3', 'username' => 'user3', 'corporation_id' => 2, 'password' => bcrypt($password)],
                ['name' => '用户4', 'username' => 'user4', 'corporation_id' => 2, 'password' => bcrypt($password)],
            ];
            //给管理员添加公司id
            $users[0]['corporation_id'] = 2;
            //合并管理员用户与数组
            $users = array_merge($users,$testUsers);
        }

        DB::table('users')->insert($users);
    }
}
