<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserPwdTableSeeder extends Seeder{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user_pwd')->delete();
        $projects = array(
            ['uid' => '1','usrn' => 'abc123', 'pwd' => 'abc', 'acc_type' => 'admin'],
            ['uid' => '2','usrn' => 'def123', 'pwd' => 'def', 'acc_type' => 'fa'],
            ['uid' => '3','usrn' => 'ghi123', 'pwd' => 'ghi', 'acc_type' => 'fa'],
            ['uid' => '4','usrn' => 'jkl123', 'pwd' => 'jkl', 'acc_type' => 'client'],
            ['uid' => '5','usrn' => 'mno123', 'pwd' => 'mno', 'acc_type' => 'client'],

        );
        // Uncomment the below to run the seeder
        DB::table('user_pwd')->insert($projects);


        /** @var Letz HASH PASSWORDS $user_pwd**/
        foreach(DB::table("user_pwd")->get() as $user_pwd) {
            DB::table("user_pwd")
                ->where("uid", $user_pwd->uid)
                ->update(array("pwd"=>Hash::make($user_pwd->pwd)));
        }
    }




}