<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterGridOnesDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_grid_ones_description')->delete();
        
        \DB::table('footer_grid_ones_description')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:08:06',
                'footer_grid_one_id' => 4,
                'id' => 7,
                'language_id' => 1,
                'name' => 'About',
                'updated_at' => '2024-03-12 12:08:06',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:08:06',
                'footer_grid_one_id' => 4,
                'id' => 8,
                'language_id' => 2,
                'name' => 'Про нас',
                'updated_at' => '2024-03-12 12:08:06',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:08:29',
                'footer_grid_one_id' => 5,
                'id' => 9,
                'language_id' => 1,
                'name' => 'Contact',
                'updated_at' => '2024-03-12 12:08:29',
            ),
            3 => 
            array (
                'created_at' => '2024-03-12 12:08:29',
                'footer_grid_one_id' => 5,
                'id' => 10,
                'language_id' => 2,
                'name' => 'Контакти',
                'updated_at' => '2024-03-12 12:08:29',
            ),
            4 => 
            array (
                'created_at' => '2024-03-12 12:08:47',
                'footer_grid_one_id' => 6,
                'id' => 11,
                'language_id' => 1,
                'name' => 'Login',
                'updated_at' => '2024-03-12 12:08:47',
            ),
            5 => 
            array (
                'created_at' => '2024-03-12 12:08:47',
                'footer_grid_one_id' => 6,
                'id' => 12,
                'language_id' => 2,
                'name' => 'Логін',
                'updated_at' => '2024-03-12 12:08:47',
            ),
            6 => 
            array (
                'created_at' => '2024-03-12 12:09:09',
                'footer_grid_one_id' => 7,
                'id' => 13,
                'language_id' => 1,
                'name' => 'Register',
                'updated_at' => '2024-03-12 12:09:09',
            ),
            7 => 
            array (
                'created_at' => '2024-03-12 12:09:09',
                'footer_grid_one_id' => 7,
                'id' => 14,
                'language_id' => 2,
                'name' => 'Регістр',
                'updated_at' => '2024-03-12 12:09:09',
            ),
        ));
        
        
    }
}