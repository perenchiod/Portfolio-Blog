<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',100);
            $table->text('body');
            $table->string('picture',100)->default("");
            $table->timestamps();
            $table->softdeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return vpopmail_del_domain(domain)
	 */
	public function down()
	{
		Schema::drop('posts');
	}
}
?>
