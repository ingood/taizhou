<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
            id	int(11)	否	递增	序号
          	project_id	int(11)	否		所属项目id
            attachment_id	int(11)	否		对应附件ID
            user_id	int(11)	否		发布人id
            name	varchar(50)	否		奖励名称
            contact	varchar(50)	否		联系人
            tel	varchar(50)	否		联系电话
            class	varchar(50)	否		奖励等级：部级、省级、地市级、国网公司、省公司、地市公司
            ranking	varchar(51)	否		奖励级别：特等奖、一等奖、二等奖、三等奖
            organization	varchar(50)	否		授奖单位
            date	timestamps()	否		授奖时间
            entity	varchar(250)	否		获奖单位
            ordering	int(11)	否		排序
            create_at	timestamps()	否	now	创建日期
         */
        Schema::create('awards', function (Blueprint $table) {
            $table->increments('id')->comment('序号');
            $table->integer('project_id')->unsigned()->comment('项目ID');
            $table->string('name', 50)->comment('奖励名称');
            $table->string('name_project', 50)->comment('获奖项目名称');
            $table->string('contact', 50)->nullable()->comment('联系人');
            $table->string('tel', 50)->nullable()->comment('联系电话');
            $table->string('class', 50)->nullable()->comment('奖励等级');
            $table->string('ranking', 51)->nullable()->comment('奖励级别');
            $table->string('organization', 50)->nullable()->comment('授奖单位');
            $table->date('date')->nullable()->comment('授奖时间');
            $table->string('entity')->nullable()->comment('获奖单位');
            $table->integer('ordering')->default(0)->comment('排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards');
    }
}
