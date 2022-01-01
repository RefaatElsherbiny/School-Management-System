<?php

use App\Models\class_room;
use App\Models\Type_blood;
use App\Models\Type_nationalite;
use Illuminate\Database\Seeder;
use App\Students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\grades;
use App\Models\My_Parent;
use App\Models\Sections;

class Student_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Students();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationalitie_id = Type_nationalite::all()->unique()->random()->id;
        $students->blood_id =Type_blood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = grades::all()->unique()->random()->id;
        $students->Classroom_id =class_room::all()->unique()->random()->id;
        $students->section_id = Sections::all()->unique()->random()->id;
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();    }
}
