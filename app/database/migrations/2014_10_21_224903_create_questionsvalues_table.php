<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsvaluesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionsValues', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->bigIncrements('valueId')->unsigned();
            $table->bigInteger('questionId')->unsigned();
            $table->integer('valuePosition')->unsigned();
            $table->text('value');
            $table->index('questionId');
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
		Schema::drop('questionsValues');
	}

}
