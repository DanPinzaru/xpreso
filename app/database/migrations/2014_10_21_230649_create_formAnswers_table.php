<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('formAnswers', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->bigIncrements('id')->unsigned();
            $table->bigInteger('userFormId')->unsigned();
            $table->bigInteger('questionId')->unsigned();
            $table->text('answerValue');
            $table->index('userFormId');
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
		Schema::drop('formAnswers');
	}

}
