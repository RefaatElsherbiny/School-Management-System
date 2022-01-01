<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(User_seeder::class);
      $this->call(grade_seeder::class);
      $this->call(class_rooms::class);
      $this->call(section_seeder::class);
      $this->call(blood_table_seeder::class);
      $this->call(nationality_table_seeder::class);
      $this->call(religion_table_seeder::class);
      $this->call(specialization::class);
      $this->call(genders::class);
      $this->call(parent_seeder::class);
      $this->call(Student_seeder::class);
      $this->call(SettingsTableSeeder::class);









    }
}
