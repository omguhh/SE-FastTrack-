<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FaclRelations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facl_relations', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->integer('cid')->unsigned();
			$table->integer('fid')->unsigned();

			$table->primary(['fid', 'cid']);
			$table->index('fid');
			$table->foreign('fid')
				->references('uid')->on('fa')
				->onDelete('restrict');

			$table->index('cid');
			$table->foreign('cid')
				->references('cid')->on('clients')
				->onDelete('restrict');
		});

		/*Schema::table('facl_relations', function($table) {
			$table->foreign('fid')->references('uid')->on('fa');
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facl_ relations');
	}


}
