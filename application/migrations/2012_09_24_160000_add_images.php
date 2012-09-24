<?php

class Add_Images {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function($table){
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('image_name');
			$table->string('image_location');
			$table->string('image_type');
			$table->string('image_size');
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
		Schema::drop('images');
	}

}