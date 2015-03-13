<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('FaTableSeeder');
		$this->call('ClientTableSeeder');
		$this->call('UserPwdTableSeeder');
		$this->call('WalletTableSeeder');
		$this->call('FaclRelationTableSeeder');
	}



}



