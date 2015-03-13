<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('clients')->delete();
        $projects = array(
            ['cid' => '1', 'doa' => '2015-03-11 12:10:34','status' => 'open', 'address' => 'abc', 'mob2' => '234567891'],
            ['cid' => '2', 'doa' => '2015-03-11 12:10:34','status' => 'open', 'address' => 'def', 'mob2' => '234567891'],
            ['cid' => '3', 'doa' => '2015-03-11 12:10:34','status' => 'open', 'address' => 'ghi', 'mob2' => '234567891'],
            ['cid' => '4', 'doa' => '2015-03-11 12:10:34','status' => 'open', 'address' => 'jkl', 'mob2' => '234567891'],
            ['cid' => '5', 'doa' => '2015-03-11 12:10:34','status' => 'open', 'address' => 'mno', 'mob2' => '234567891'],
        );
        // Uncomment the below to run the seeder
        DB::table('clients')->insert($projects);
    }

}