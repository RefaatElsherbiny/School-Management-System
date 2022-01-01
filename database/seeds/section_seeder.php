<?php

use App\Models\grades;
use App\Models\class_room;

use App\Models\Sections;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class section_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     DB::table('create_sections')->delete();

    //     $Sections = [
    //         ['en' => 'a', 'ar' => 'ا'],
    //         ['en' => 'b', 'ar' => 'ب'],
    //         ['en' => 'c', 'ar' => 'ت'],
    //     ];

    //     foreach ($Sections as $section) {
    //         Sections::create([
    //             'name_sections' => $section,
    //             'Status' => 1,
    //             'Grade_id' => grades::all()->unique()->random()->id,
    //             'Class_id' => class_room::all()->unique()->random()->id
    //         ]);
    //     }
    }
}
