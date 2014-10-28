<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usersForms', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->bigIncrements('userFormId')->unsigned();
            $table->bigInteger('userId')->unsigned();
            $table->index('userId');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usersForms');
	}

}
