<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FaTableSeeder extends Seeder{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('fa')->delete();
        $projects = array(
            ['uid' => '1','address' => 'New Address 1', 'mobile2' => '54342395'],
            ['uid' => '2','address' => 'New Address 2', 'mobile2' => '54343495'],
            ['uid' => '3','address' => 'New Address 3', 'mobile2' => '54342395'],
            ['uid' => '4','address' => 'New Address 4', 'mobile2' => '56734239'],
            ['uid' => '5','address' => 'New Address 5', 'mobile2' => '34342395'],
        );
        // Uncomment the below to run the seeder
        DB::table('fa')->insert($projects);
    }

}