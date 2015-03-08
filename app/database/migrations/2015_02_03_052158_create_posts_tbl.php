<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
				$table->increments('id');
				$table->string('title');
				$table->text('content');
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')
						->references('id')->on('users')
						->onDelete('cascade');
				$table->integer('reviewed');
				$table->timestamps();
				$table->binary('image');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
