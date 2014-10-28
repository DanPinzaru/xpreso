<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
			$table->bigIncrements('questionId')->unsigned();
            $table->bigInteger('formId')->unsigned();
            $table->integer('questionPosition')->unsigned();
            $table->integer('questionType')->unsigned();
            $table->tinyInteger('mandatory')->unsigned();
            $table->text('questionText');
            $table->index('formId');
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
		Schema::drop('questions');
	}

}
