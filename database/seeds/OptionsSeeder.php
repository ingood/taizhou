<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rwly = ['A、国家计划', 'B、国家电网（力）公司计划', 'C、部、委及省、市、自治区', 'D、基金资助', 'E、国际合作', 'F、其它委托单位', 'G、自选', 'H、非职务', 'I、其它'];
        $ssgmjjhy = explode('，','A、农、林、牧、渔业，B、采掘业，C、制造业，D、电力、煤气、及水的生产和供应业，E、建筑业，F、地质勘查业、水利管理业，G、交通运输、仓储及邮电通信业，H、批发和零售贸易、餐饮业，I、金融、保险业，J、房地产业，K、社会服务页，L、卫生、体育和社会福利业，M、教育、文化艺术和广播电影电视事业，N、科学研究和综合技术服务业，O、国家机关、党政机关和社会团体，P、其它行业');

        $temp = compact('rwly', 'ssgmjjhy');
        $data = [];
        foreach($temp as $key=>$value) {
            foreach($value as $v) {
                $data[] = [
                    'category' => $key,
                    'name' => $v,
                ];
            }
        }
        DB::table('options')->insert($data);
    }
}
