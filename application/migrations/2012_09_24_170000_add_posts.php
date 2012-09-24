<?php

class Add_Posts {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('post_title');
			$table->text('post_content');
			$table->string('excerpt');
			$table->integer('user_id')->unsigned();
			$table->integer('image_id')->unsigned();
			$table->timestamps();	

			$table->foreign('user_id')->references('id')->on('users');

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}