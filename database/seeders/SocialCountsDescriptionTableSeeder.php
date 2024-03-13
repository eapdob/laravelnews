<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialCountsDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_counts_description')->delete();
        
        \DB::table('social_counts_description')->insert(array (
            0 => 
            array (
                'button_text' => 'Likes',
                'created_at' => '2024-03-11 01:18:38',
                'fan_count' => '200k',
                'fan_type' => 'Likes',
                'id' => 1,
                'language_id' => 1,
                'social_count_id' => 1,
                'updated_at' => '2024-03-11 01:18:38',
            ),
            1 => 
            array (
                'button_text' => 'Лайки',
                'created_at' => '2024-03-11 01:18:38',
                'fan_count' => '200k',
                'fan_type' => 'Лайки',
                'id' => 2,
                'language_id' => 2,
                'social_count_id' => 1,
                'updated_at' => '2024-03-11 01:18:38',
            ),
            2 => 
            array (
                'button_text' => 'Likes',
                'created_at' => '2024-03-11 01:20:04',
                'fan_count' => '300k',
                'fan_type' => 'Followers',
                'id' => 3,
                'language_id' => 1,
                'social_count_id' => 2,
                'updated_at' => '2024-03-11 01:20:04',
            ),
            3 => 
            array (
                'button_text' => 'Лайки',
                'created_at' => '2024-03-11 01:20:04',
                'fan_count' => '300k',
                'fan_type' => 'Послідовники',
                'id' => 4,
                'language_id' => 2,
                'social_count_id' => 2,
                'updated_at' => '2024-03-11 01:20:04',
            ),
            4 => 
            array (
                'button_text' => 'Subscribe',
                'created_at' => '2024-03-11 01:21:13',
                'fan_count' => '100k',
                'fan_type' => 'Fans',
                'id' => 5,
                'language_id' => 1,
                'social_count_id' => 3,
                'updated_at' => '2024-03-11 01:21:13',
            ),
            5 => 
            array (
                'button_text' => 'Підпишіться',
                'created_at' => '2024-03-11 01:21:13',
                'fan_count' => '100k',
                'fan_type' => 'Фанів',
                'id' => 6,
                'language_id' => 2,
                'social_count_id' => 3,
                'updated_at' => '2024-03-11 01:21:13',
            ),
        ));
        
        
    }
}