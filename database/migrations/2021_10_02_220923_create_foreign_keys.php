<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
        Schema::table('class_room', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('grades')
						->onDelete('cascade');
		});



        Schema::table('create_sections', function(Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('grades')
                ->onDelete('cascade');
        });

        Schema::table('my__parents', function(Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('type_nationalites');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type_bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('type_religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('type_nationalites');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type_bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('type_religions');
        });


//  Start relation My_parent



Schema::table('parent__attachments', function(Blueprint $table) {
    $table->foreign('parent_id')->references('id')->on('my__parents');
});


//  End relation My_parent

            // Schema::table('create_sections', function(Blueprint $table) {
            //     $table->foreign('class_id')->references('id')->on('class_room')
            //         ->onDelete('cascade');
            // });
	}

	public function down()
	{
		Schema::table('class_room', function(Blueprint $table) {
			$table->dropForeign('class_room_Grade_id_foreign');
		});
        Schema::table('create_sections', function(Blueprint $table) {
            $table->dropForeign('create_sections_Grade_id_foreign');
        });
        Schema::table('create_sections', function(Blueprint $table) {
            $table->dropForeign('create_sections_class_id_foreign');
        });
	}
}
