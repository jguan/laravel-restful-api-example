<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cinemas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('address')->unique();
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('cinemas');
	}

}
