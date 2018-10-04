<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email_ids');
            $table->string('status');
            $table->bigInteger('port_one_reason')->unsigned();
            $table->foreign('port_one_reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('port_two_reason')->unsigned();
            $table->foreign('port_two_reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('machines');
    }
}
