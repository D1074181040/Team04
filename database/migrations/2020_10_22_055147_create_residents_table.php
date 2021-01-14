<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id('id')->comment('編號')->unsigned();
            $table->integer('n_ID')->comment('卡號')->unsigned();
            $table->string('p_name',20)->comment('姓名');
            $table->integer('phone')->comment('聯絡電話')->unsigned();
            $table->string('gender',20)->comment('性別');
            $table->string('region',20)->comment('區域');
            $table->tinyInteger('floor')->comment('樓層')->unsigned();
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
        Schema::dropIfExists('residents');
    }
}
