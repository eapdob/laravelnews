<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterGridTwosDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_grid_twos_description')->delete();
        
        \DB::table('footer_grid_twos_description')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:09:58',
                'footer_grid_two_id' => 10,
                'id' => 21,
                'language_id' => 1,
                'name' => 'About Us',
                'updated_at' => '2024-03-12 12:09:58',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:09:58',
                'footer_grid_two_id' => 10,
                'id' => 22,
                'language_id' => 2,
                'name' => 'Про нас',
                'updated_at' => '2024-03-12 12:09:58',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:10:27',
                'footer_grid_two_id' => 11,
                'id' => 23,
                'language_id' => 1,
                'name' => 'Best News',
                'updated_at' => '2024-03-12 12:10:27',
            ),
            3 => 
            array (
                'created_at' => '2024-03-12 12:10:27',
                'footer_grid_two_id' => 11,
                'id' => 24,
                'language_id' => 2,
                'name' => 'Найкращі новини',
                'updated_at' => '2024-03-12 12:10:27',
            ),
            4 => 
            array (
                'created_at' => '2024-03-12 12:10:43',
                'footer_grid_two_id' => 12,
                'id' => 25,
                'language_id' => 1,
                'name' => 'New News',
                'updated_at' => '2024-03-12 12:10:43',
            ),
            5 => 
            array (
                'created_at' => '2024-03-12 12:10:43',
                'footer_grid_two_id' => 12,
                'id' => 26,
                'language_id' => 2,
                'name' => 'Нові новини',
                'updated_at' => '2024-03-12 12:10:43',
            ),
        ));
        
        
    }
}