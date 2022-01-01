<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::create('class_room', function(Blueprint $table) {
        $table->id();
        $table->string('name_class');
        $table->bigInteger('Grade_id')->unsigned();
        $table->timestamps();
    });
}

public function down()
{
    Schema::drop('class_room');
}

}
