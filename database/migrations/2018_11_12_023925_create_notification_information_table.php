<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->comment('类型:1、手机 需要加上区号 2、邮箱');
            $table->string('info')->comment('手机号 需要加上区号 或者 邮箱号');
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
        Schema::dropIfExists('notification_information');
    }
}
