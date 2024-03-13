<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeSectionSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_section_settings')->delete();
        
        \DB::table('home_section_settings')->insert(array (
            0 => 
            array (
                'category_section_four' => '31',
                'category_section_one' => '28',
                'category_section_three' => '29',
                'category_section_two' => '30',
                'created_at' => '2024-03-12 09:00:53',
                'id' => 1,
                'language_id' => 1,
                'updated_at' => '2024-03-12 09:00:53',
            ),
            1 => 
            array (
                'category_section_four' => '31',
                'category_section_one' => '28',
                'category_section_three' => '29',
                'category_section_two' => '30',
                'created_at' => '2024-03-12 09:00:53',
                'id' => 2,
                'language_id' => 2,
                'updated_at' => '2024-03-12 09:00:53',
            ),
        ));
        
        
    }
}