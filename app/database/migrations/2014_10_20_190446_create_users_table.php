<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
			$table->bigIncrements('userId')->unsigned();
            $table->string('userName', 100)->unique();
            $table->string('userPasswd', 100);
            $table->string('group', 32);
            $table->rememberToken();
            $table->timestamps();
		});
        
        $admin = new User();
        $admin->userName = 'admin';
        $admin->userPasswd = 'admin';
        $admin->group = User::$userGroups['admins'];
        $admin->addUser();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
