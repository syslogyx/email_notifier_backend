<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('status')->nullable();

            $table->integer('machine_id')->nullable()->unsigned();
            $table->foreign('machine_id')->references('id')->on('machines');

            $table->string('port_1_0_status')->nullable();

            $table->integer('port_1_0_reason')->unsigned();
            $table->foreign('port_1_0_reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');

            $table->string('port_1_1_status')->nullable();

            $table->integer('port_1_1_reason')->unsigned();
            $table->foreign('port_1_1_reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');

            $table->string('port_2_0_status')->nullable();

            $table->integer('port_2_0_reason')->unsigned();
            $table->foreign('port_2_0_reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');

            $table->string('port_2_1_status')->nullable();
            
            $table->integer('port_2_1_reason')->unsigned();
            $table->foreign('port_2_1_reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('devices');
    }
}
