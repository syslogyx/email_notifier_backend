<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run() {
        User::create([
            "name" => "Admin",
            "email" => "admin@syslogyx.com",
            "password" => Hash::make('admin123'),
            "role_id" =>1,          
        ]);

//        User::create([
//            "name" => "Shekhar",
//            "email" => "shekhar@vyako.com",
//            "password" => Hash::make('test123'),
//            "gender" => "Male",
//            "status" => 1,
//            "user_id" => 0,
//            "total_experience" => 1,
//            "email_internal" => "monica@syslogyx.in",
//            "email_external" => "monica@vyako.com",
//            "department" => "Android",
//            "designation" => "Software Engineer",
//            "avatar" => "image.png",
//        ]);
    }

}
