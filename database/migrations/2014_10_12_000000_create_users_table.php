<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->nullable();
            $table->string('username')->unique()->comment('登录用户名');
            $table->string('password')->comment('登录密码');
            $table->string('name')->comment('联系人姓名');
            $table->string('cellphone')->nullable()->comment('联系人手机');
            $table->integer('corporation_id')->unsigned()->nullable()->comment('单位id');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
