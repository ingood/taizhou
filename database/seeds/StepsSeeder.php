<?php

use Illuminate\Database\Seeder;

class StepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['route'=>'projects.edit', 'name'=>'jbxx', 'title'=>'项目基本信息'],
            ['route'=>'projects.edit', 'name'=>'xmjj', 'title'=>'项目简介'],
            ['route'=>'projects.edit', 'name'=>'lxbj', 'title'=>'立项背景'],
            ['route'=>'projects.edit', 'name'=>'xxnr', 'title'=>'详细内容'],
            ['route'=>'projects.edit', 'name'=>'jscx', 'title'=>'技术创新'],
            ['route'=>'projects.edit', 'name'=>'zhbj', 'title'=>'综合比较'],
            ['route'=>'projects.edit', 'name'=>'yyqk', 'title'=>'应用情况'],
            ['route'=>'projects.edit', 'name'=>'xyqk', 'title'=>'效益情况'],
        ];

        foreach($data as $key=>&$value) {
            $value['order'] = $key;
        }
        DB::table('steps')->insert($data);
    }
}
