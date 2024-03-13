<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories_description')->delete();
        
        \DB::table('categories_description')->insert(array (
            0 => 
            array (
                'category_id' => 28,
                'created_at' => '2024-03-10 22:43:30',
                'id' => 58,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-10 22:43:30',
            ),
            1 => 
            array (
                'category_id' => 28,
                'created_at' => '2024-03-10 22:43:30',
                'id' => 59,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-10 22:43:30',
            ),
            2 => 
            array (
                'category_id' => 29,
                'created_at' => '2024-03-10 22:44:03',
                'id' => 60,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-10 22:44:03',
            ),
            3 => 
            array (
                'category_id' => 29,
                'created_at' => '2024-03-10 22:44:03',
                'id' => 61,
                'language_id' => 2,
                'name' => 'Подія',
                'updated_at' => '2024-03-10 22:44:03',
            ),
            4 => 
            array (
                'category_id' => 30,
                'created_at' => '2024-03-10 22:44:46',
                'id' => 62,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-10 22:44:46',
            ),
            5 => 
            array (
                'category_id' => 30,
                'created_at' => '2024-03-10 22:44:46',
                'id' => 63,
                'language_id' => 2,
                'name' => 'Спосіб життя',
                'updated_at' => '2024-03-10 22:44:46',
            ),
            6 => 
            array (
                'category_id' => 31,
                'created_at' => '2024-03-10 22:45:07',
                'id' => 64,
                'language_id' => 1,
                'name' => 'Politics',
                'updated_at' => '2024-03-10 22:45:07',
            ),
            7 => 
            array (
                'category_id' => 31,
                'created_at' => '2024-03-10 22:45:07',
                'id' => 65,
                'language_id' => 2,
                'name' => 'Політика',
                'updated_at' => '2024-03-10 22:45:07',
            ),
            8 => 
            array (
                'category_id' => 32,
                'created_at' => '2024-03-10 22:45:37',
                'id' => 66,
                'language_id' => 1,
                'name' => 'Sports',
                'updated_at' => '2024-03-10 22:45:37',
            ),
            9 => 
            array (
                'category_id' => 32,
                'created_at' => '2024-03-10 22:45:37',
                'id' => 67,
                'language_id' => 2,
                'name' => 'Спорт',
                'updated_at' => '2024-03-10 22:45:37',
            ),
            10 => 
            array (
                'category_id' => 33,
                'created_at' => '2024-03-10 22:49:23',
                'id' => 68,
                'language_id' => 1,
                'name' => 'Tech',
                'updated_at' => '2024-03-10 22:49:23',
            ),
            11 => 
            array (
                'category_id' => 33,
                'created_at' => '2024-03-10 22:49:23',
                'id' => 69,
                'language_id' => 2,
                'name' => 'Техніка',
                'updated_at' => '2024-03-10 22:49:23',
            ),
            12 => 
            array (
                'category_id' => 34,
                'created_at' => '2024-03-10 22:50:17',
                'id' => 70,
                'language_id' => 1,
                'name' => 'Travel',
                'updated_at' => '2024-03-10 22:50:17',
            ),
            13 => 
            array (
                'category_id' => 34,
                'created_at' => '2024-03-10 22:50:17',
                'id' => 71,
                'language_id' => 2,
                'name' => 'Подорожі',
                'updated_at' => '2024-03-10 22:50:17',
            ),
        ));
        
        
    }
}