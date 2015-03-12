<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fa extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fa', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('uid');
			$table->longText('address');
			$table->integer('mobile2');

			$table->index('uid');
			$table->foreign('uid')
				->references('id')->on('users')
				->onDelete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fa');
	}

}
