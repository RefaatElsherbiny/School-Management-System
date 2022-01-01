<?php

use App\Models\grades;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class grade_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('grades')->delete();
        // $grades = [
        //     ['en'=> 'Primary stage', 'ar'=> 'المرحلة الابتدائية'],
        //     ['en'=> 'middle School', 'ar'=> 'المرحلة الاعدادية'],
        //     ['en'=> 'High school', 'ar'=> 'المرحلة الثانوية'],
        // ];

        // foreach ($grades as $grade) {
        //     grades::create([
        //         'name_grades' => $grade,
        //         'note_grades' => 'very good'
        //     ]);
        // }
    }
}
