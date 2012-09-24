<?php

class Add_Users {

	public function up()
	{
		Schema::create('users', function($table){
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->timestamps();

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}