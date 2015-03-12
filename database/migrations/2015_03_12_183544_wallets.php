<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wallets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wallets', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->integer('cid')->unsigned();
			$table->decimal('balance', 12,2);
			$table->decimal('equity',12,2);

			$table->index('cid');
			$table->foreign('cid')
				->references('cid')->on('clients')
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
		Schema::drop('wallets');
	}

}
