<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_links')->delete();
        
        \DB::table('social_links')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:05:18',
                'icon' => 'fab fa-facebook-f',
                'id' => 1,
                'status' => 1,
                'updated_at' => '2024-03-12 12:05:18',
                'url' => 'https://www.linkedin.com/',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:05:30',
                'icon' => 'fab fa-twitter',
                'id' => 2,
                'status' => 1,
                'updated_at' => '2024-03-12 12:05:30',
                'url' => 'https://www.linkedin.com/',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:05:43',
                'icon' => 'fab fa-linkedin-in',
                'id' => 3,
                'status' => 1,
                'updated_at' => '2024-03-12 12:05:43',
                'url' => 'https://www.linkedin.com/',
            ),
            3 => 
            array (
                'created_at' => '2024-03-12 12:05:56',
                'icon' => 'fab fa-instagram',
                'id' => 4,
                'status' => 1,
                'updated_at' => '2024-03-12 12:05:56',
                'url' => 'https://www.linkedin.com/',
            ),
        ));
        
        
    }
}