<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Status_Reason;

class CreateStatusReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status__reasons', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('reason');
            $table->string('status')->nullable();
            $table->timestamps();
        });

        $data = array(
            array(
                "reason" => "NA",
                "status" => null
            )
        );

        Status_Reason::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status__reasons');
    }
}
