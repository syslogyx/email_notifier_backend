<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsToStatusReasons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status__reasons', function (Blueprint $table) {
          $table->integer('device_id')->nullable()->unsigned();
          $table->foreign('device_id')->references('id')->on('devices');
          $table->string('port_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status__reasons', function (Blueprint $table) {
            //
        });
    }
}
