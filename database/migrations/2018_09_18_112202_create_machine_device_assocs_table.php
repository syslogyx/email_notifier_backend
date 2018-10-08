<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineDeviceAssocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_device_assocs', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('machine_id')->unsigned();
            $table->foreign('machine_id')->references('id')->on('machines')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('machine_device_assocs');
    }
}
