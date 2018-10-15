<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->string('port');
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
        Schema::dropIfExists('machine_statuses');
    }
}