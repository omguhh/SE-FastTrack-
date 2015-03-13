<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
        $projects = array(
            ['id' => 1, 'name' => 'abc', 'email' => 'abc@gmail.com', 'mobile' => '1234567890'],
            ['id' => 2, 'name' => 'def', 'email' => 'def@gmail.com', 'mobile' => '1234567890'],
            ['id' => 3, 'name' => 'ghi', 'email' => 'ghi@gmail.com', 'mobile' => '1234567890'],
            ['id' => 4, 'name' => 'jkl', 'email' => 'jkl@gmail.com', 'mobile' => '1234567890'],
            ['id' => 5, 'name' => 'mno', 'email' => 'mno@gmail.com', 'mobile' => '1234567890'],
        );
        // Uncomment the below to run the seeder
        DB::table('users')->insert($projects);
    }

}