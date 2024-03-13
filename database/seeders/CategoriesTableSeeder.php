<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 22:43:30',
                'id' => 28,
                'parent_id' => NULL,
                'show_at_nav' => 1,
                'slug' => 'business',
                'status' => 1,
                'updated_at' => '2024-03-10 22:44:15',
            ),
            1 => 
            array (
                'created_at' => '2024-03-10 22:44:03',
                'id' => 29,
                'parent_id' => NULL,
                'show_at_nav' => 1,
                'slug' => 'event',
                'status' => 1,
                'updated_at' => '2024-03-10 22:44:03',
            ),
            2 => 
            array (
                'created_at' => '2024-03-10 22:44:46',
                'id' => 30,
                'parent_id' => NULL,
                'show_at_nav' => 1,
                'slug' => 'lifestyle',
                'status' => 1,
                'updated_at' => '2024-03-10 22:44:46',
            ),
            3 => 
            array (
                'created_at' => '2024-03-10 22:45:07',
                'id' => 31,
                'parent_id' => NULL,
                'show_at_nav' => 1,
                'slug' => 'politics',
                'status' => 1,
                'updated_at' => '2024-03-10 22:45:07',
            ),
            4 => 
            array (
                'created_at' => '2024-03-10 22:45:37',
                'id' => 32,
                'parent_id' => NULL,
                'show_at_nav' => 1,
                'slug' => 'sports',
                'status' => 1,
                'updated_at' => '2024-03-10 22:45:37',
            ),
            5 => 
            array (
                'created_at' => '2024-03-10 22:49:23',
                'id' => 33,
                'parent_id' => NULL,
                'show_at_nav' => 0,
                'slug' => 'tech',
                'status' => 1,
                'updated_at' => '2024-03-10 22:49:23',
            ),
            6 => 
            array (
                'created_at' => '2024-03-10 22:50:17',
                'id' => 34,
                'parent_id' => NULL,
                'show_at_nav' => 0,
                'slug' => 'travel',
                'status' => 1,
                'updated_at' => '2024-03-10 22:50:17',
            ),
        ));
        
        
    }
}