<?php

use Illuminate\Database\Migrations\Migration;

class AddGeocoordinatesToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
            $table->decimal('geolat', 10, 6);
            $table->decimal('geolng', 10, 6);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table) {
            $table->dropColumn('geolat');
            $table->dropColumn('geolng');
        });
	}

}