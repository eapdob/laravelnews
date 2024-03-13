<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 12:01:12',
                'default' => 1,
                'id' => 1,
                'lang' => 'en',
                'name' => 'English',
                'slug' => 'en',
                'status' => 1,
                'updated_at' => '2024-03-10 12:01:12',
            ),
            1 => 
            array (
                'created_at' => '2023-12-29 17:37:02',
                'default' => 0,
                'id' => 2,
                'lang' => 'uk',
                'name' => 'Ukrainian',
                'slug' => 'uk',
                'status' => 1,
                'updated_at' => '2023-12-29 17:37:02',
            ),
        ));
        
        
    }
}