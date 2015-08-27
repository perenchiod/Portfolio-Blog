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
		Schema::create('users' , function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name' , 255);
			$table->string('last_name' , 255)->nullable();
			$table->string('email' , 255)->unique();
			$table->string('username' , 255)->unique;
			$table->string('password' , 255);
			$table->string('user_role' , 20)->default("user");
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}

}
