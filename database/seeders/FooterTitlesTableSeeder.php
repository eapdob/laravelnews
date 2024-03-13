<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterTitlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_titles')->delete();
        
        \DB::table('footer_titles')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 12:03:59',
                'footer_grid' => 'footer_grid_one',
                'id' => 1,
                'language_id' => 1,
                'title' => 'Help links',
                'updated_at' => '2024-03-12 12:07:33',
            ),
            1 => 
            array (
                'created_at' => '2024-03-10 12:03:59',
                'footer_grid' => 'footer_grid_one',
                'id' => 2,
                'language_id' => 2,
                'title' => 'Посилання на допомогу',
                'updated_at' => '2024-03-12 12:07:33',
            ),
            2 => 
            array (
                'created_at' => '2024-03-10 12:04:35',
                'footer_grid' => 'footer_grid_two',
                'id' => 3,
                'language_id' => 1,
                'title' => 'Short Links',
                'updated_at' => '2024-03-12 12:09:36',
            ),
            3 => 
            array (
                'created_at' => '2024-03-10 12:04:35',
                'footer_grid' => 'footer_grid_two',
                'id' => 4,
                'language_id' => 2,
                'title' => 'Короткі посилання',
                'updated_at' => '2024-03-12 12:09:36',
            ),
            4 => 
            array (
                'created_at' => '2024-03-10 12:04:53',
                'footer_grid' => 'footer_grid_three',
                'id' => 5,
                'language_id' => 1,
                'title' => 'Trending',
                'updated_at' => '2024-03-12 12:11:08',
            ),
            5 => 
            array (
                'created_at' => '2024-03-10 12:04:53',
                'footer_grid' => 'footer_grid_three',
                'id' => 6,
                'language_id' => 2,
                'title' => 'В тренді',
                'updated_at' => '2024-03-12 12:11:08',
            ),
        ));
        
        
    }
}