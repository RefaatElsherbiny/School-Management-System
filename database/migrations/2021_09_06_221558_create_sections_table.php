<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_sections', function(Blueprint $table) {
            $table->id();
			$table->string('name_sections', 500);
			$table->bigInteger('grade_id')->unsigned();
			$table->bigInteger('class_id')->unsigned();
            $table->integer('status');
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
		Schema::drop('create_sections');
    }
}
