<?php

use App\Models\class_room;
use App\Models\grades;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class class_rooms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('class_room')->delete();
        // $classrooms = [
        //     ['en'=> 'First grade', 'ar'=> 'الصف الاول'],
        //     ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
        //     ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        // ];

        // foreach ($classrooms as $classroom) {
        //     class_room::create([
        //     'name_class' => $classroom,
        //     'Grade_id' => grades::all()->unique()->random()->id
        //     ]);
        // }

      }
}
