<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('所属用户id');
            $table->string('xmmc')->unique()->comment('项目名称');
            $table->string('xmmcyw')->unique()->comment('项目名称(英文)');
            $table->string('ztc')->nullable()->comment('主题词');
            $table->string('cgdjhm')->nullable()->comment('成果登记号码');
            $table->string('tjjllb')->nullable()->comment('推荐奖励类别');
            $table->boolean('xmmckfgb')->nullable()->comment('项目名称可否公布');
            $table->string('rwly')->nullbale()->comment('任务来源');
            $table->string('ssgmjjhy')->nullbale()->comment('所属国民经济行业');
            $table->string('jhmchbh')->nullable()->comment('计划(基金)名称和编号');
            $table->dateTime('yjqssj')->nullable()->comment('研究起始时间');
            $table->dateTime('yjwcsj')->nullable()->comment('研究完成时间');
            $table->string('tjdw')->nullable()->comment('推荐单位');
            $table->string('xkfldm')->nullable()->comment('学科分类代码');
            $table->string('xkflmc')->nullable()->comment('学科分类名称');
            $table->string('cgfldm')->nullable()->comment('成果分类代码');
            $table->string('cgflmc')->nullable()->comment('成果分类名称');
            $table->text('xmjj')->nullable()->comment('项目简介');
            $table->text('lxbj')->nullable()->comment('立项背景');
            $table->text('jscx')->nullable()->comment('技术创新');
            $table->text('bmyd')->nullable()->comment('保密要点');
            $table->text('zhbj')->nullable()->comment('综合比较');
            $table->text('yyqk')->nullable()->comment('应用情况');
            $table->text('xjjwt')->nullable()->comment('需解决问题');
            $table->text('sbyj')->nullable()->comment('申报意见');
            $table->string('status')->default('编辑中')->comment('项目状态');
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
        Schema::dropIfExists('projects');
    }
}
