<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('cid');
			$table->timestamp('doa');
			$table->enum('status', ['open','closed']);
			$table->string('address');
			$table->integer('mob2');

			$table->index('cid');
			$table->foreign('cid')
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
		Schema::drop('clients');
		/*$table->dropForeign('cid');*/
	}

}

