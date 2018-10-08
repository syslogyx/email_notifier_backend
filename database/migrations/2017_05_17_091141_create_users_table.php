<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
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
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->integer('role_id');
            $table->rememberToken();
            $table->timestamps();
        });

        $data = array(
            array(
                "name" => "Admin",
                "mobile" => "9876543210",
                "email" => "admin@syslogyx.com",
                "password" => Hash::make('admin123'),
                "role_id" => 1,
            ),
            array(
                "name" => "Operator",
                "mobile" => "9876543210",
                "email" => "operator@syslogyx.com",
                "password" => Hash::make('operator123'),
                "role_id" => 2,
            )
        );

        User::insert($data);

//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
