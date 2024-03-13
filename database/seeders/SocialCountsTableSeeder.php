<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialCountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_counts')->delete();
        
        \DB::table('social_counts')->insert(array (
            0 => 
            array (
                'color' => '#0a66c2',
                'created_at' => '2024-03-11 01:18:38',
                'icon' => 'fab fa-linkedin-in',
                'id' => 1,
                'status' => 1,
                'updated_at' => '2024-03-11 01:18:38',
                'url' => 'https://www.linkedin.com/',
            ),
            1 => 
            array (
                'color' => '#0b84ee',
                'created_at' => '2024-03-11 01:20:04',
                'icon' => 'fab fa-facebook-f',
                'id' => 2,
                'status' => 1,
                'updated_at' => '2024-03-11 01:20:04',
                'url' => 'https://www.facebook.com/',
            ),
            2 => 
            array (
                'color' => '#ff0000',
                'created_at' => '2024-03-11 01:21:13',
                'icon' => 'fab fa-youtube',
                'id' => 3,
                'status' => 1,
                'updated_at' => '2024-03-11 01:21:13',
                'url' => 'https://www.facebook.com/',
            ),
        ));
        
        
    }
}