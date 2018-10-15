<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_estimations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('machine_status_id')->unsigned();
            $table->foreign('machine_status_id')->references('id')->on('machine_statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('reason')->unsigned();
            $table->foreign('reason')->references('id')->on('status__reasons')->onUpdate('cascade')->onDelete('cascade');
            $table->string('msg');
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
        Schema::dropIfExists('user_estimations');
    }
}
