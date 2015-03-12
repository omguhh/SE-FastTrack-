<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPwd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_pwd', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('uid');
			$table->string('usrn',20);
			$table->string('pwd',20);
			$table->enum('acc_type', ['admin','fa','client']);

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
		Schema::drop('user_pwd');
	}


}
