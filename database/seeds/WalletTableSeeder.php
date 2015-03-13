<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class WalletTableSeeder extends Seeder{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('wallets')->delete();
        $projects = array(
            ['cid' => '1','balance' => '1000', 'equity' => '1250'],
            ['cid' => '2','balance' => '5000', 'equity' => '5000'],
            ['cid' => '3','balance' => '7500', 'equity' => '2000'],
            ['cid' => '4','balance' => '3000', 'equity' => '2500'],
            ['cid' => '5','balance' => '9000', 'equity' => '7000'],

        );
        // Uncomment the below to run the seeder
        DB::table('wallets')->insert($projects);
    }
}