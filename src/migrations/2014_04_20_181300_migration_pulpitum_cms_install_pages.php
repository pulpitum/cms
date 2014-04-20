<?php

use Illuminate\Database\Migrations\Migration;

class MigrationPulpitumCmsInstallPages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_pages', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('root_template')->nullable();
			$table->text('meta_keywords')->nullable();
			$table->text('meta_description')->nullable();
			$table->string('identifier');
			$table->string('content_heading')->nullable();
			$table->text('content')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->boolean('is_active')->default(1);
			$table->timestamps();

			// We'll need to ensure that MySQL uses the InnoDB engine to
			// support the indexes, other engines aren't affected.
			$table->engine = 'InnoDB';
			$table->unique('identifier');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_pages');
	}

}
