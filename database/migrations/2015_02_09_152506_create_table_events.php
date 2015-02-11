<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
            $table->longText('description')->nullable();
            $table->longText('menu')->nullable();
            $table->decimal('price', 5, 2)->nullable();
            $table->date('when')->nullable();
            $table->integer('max_partecipant')->nullable();
            $table->integer('min_partecipant')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('picture_id')->unsigned()->nullable();

            $table->string ('status')->nullable();
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
		Schema::drop('events');
	}

}
