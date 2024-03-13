<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterGridThreesDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_grid_threes_description')->delete();
        
        \DB::table('footer_grid_threes_description')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:11:45',
                'footer_grid_three_id' => 3,
                'id' => 5,
                'language_id' => 1,
                'name' => 'Health',
                'updated_at' => '2024-03-12 12:11:45',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:11:45',
                'footer_grid_three_id' => 3,
                'id' => 6,
                'language_id' => 2,
                'name' => 'Здоров\'я',
                'updated_at' => '2024-03-12 12:11:45',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:12:02',
                'footer_grid_three_id' => 4,
                'id' => 7,
                'language_id' => 1,
                'name' => 'Politics',
                'updated_at' => '2024-03-12 12:12:02',
            ),
            3 => 
            array (
                'created_at' => '2024-03-12 12:12:02',
                'footer_grid_three_id' => 4,
                'id' => 8,
                'language_id' => 2,
                'name' => 'Політика',
                'updated_at' => '2024-03-12 12:12:02',
            ),
            4 => 
            array (
                'created_at' => '2024-03-12 12:12:18',
                'footer_grid_three_id' => 5,
                'id' => 9,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-12 12:12:18',
            ),
            5 => 
            array (
                'created_at' => '2024-03-12 12:12:18',
                'footer_grid_three_id' => 5,
                'id' => 10,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-12 12:12:18',
            ),
        ));
        
        
    }
}