<?php

use Illuminate\Database\Seeder;

class CorporationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //测试环境下添加测试厂家
        if (App::environment('local')) {
            DB::table('corporations')->insert([
                ['code'=>'010124', 'name'=>'东北电力科学研究院有限公司'],
                ['code'=>'010125', 'name'=>'浙江电力科学研究院有限公司'],
                ['code'=>'010126', 'name'=>'华东电力科学研究院有限公司'],
            ]);
        }
    }
}
