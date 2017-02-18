<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contacts')->insert([
         'name' => "Pavlo",
         'surname' => "Livchak",
         'phone' => "1234",
         'info' => "Thats me",
         'birthday' => "1991-05-27",
         'created_at' => date("Y-m-d"),
         'updated_at' => date("Y-m-d")
     ]);
     DB::table('contacts')->insert([
        'name' => "Guy",
        'surname' => "Random",
        'phone' => "234",
        'info' => "Thats me",
        'birthday' => "1991-05-27",
        'created_at' => date("Y-m-d"),
        'updated_at' => date("Y-m-d")
    ]);
    DB::table('contacts')->insert([
       'name' => "Larry",
       'surname' => "Bird",
       'phone' => "567",
       'info' => "Thats me",
       'birthday' => "1991-05-27",
       'created_at' => date("Y-m-d"),
       'updated_at' => date("Y-m-d")
   ]);
    }
}
