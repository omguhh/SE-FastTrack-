<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FaclRelationTableSeeder extends Seeder{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('facl_relations')->delete();
        $projects = array(
            ['cid' => '2', 'fid' => '4'],
            ['cid' => '3', 'fid' => '5'],

        );
        // Uncomment the below to run the seeder
        DB::table('facl_relations')->insert($projects);
    }

}