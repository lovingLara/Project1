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
		Schema::create('users', function($table){
				$table->increments('id');
				$table->string('fname');
				$table->string('surname');
				$table->integer('type');
				$table->string('email');
				$table->string('password');
				$table->binary('pic');
				$table->integer('status');
				$table->integer('is_online');
				$table->integer('is_offline');
				$table->rememberToken();
				$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}
