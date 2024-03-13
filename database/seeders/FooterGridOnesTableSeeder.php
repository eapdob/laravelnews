<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterGridOnesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_grid_ones')->delete();
        
        \DB::table('footer_grid_ones')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:08:06',
                'id' => 4,
                'status' => 1,
                'updated_at' => '2024-03-12 12:08:06',
                'url' => '/about',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:08:29',
                'id' => 5,
                'status' => 1,
                'updated_at' => '2024-03-12 12:08:29',
                'url' => '/contact',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:08:47',
                'id' => 6,
                'status' => 1,
                'updated_at' => '2024-03-12 12:08:47',
                'url' => '/login',
            ),
            3 => 
            array (
                'created_at' => '2024-03-12 12:09:09',
                'id' => 7,
                'status' => 1,
                'updated_at' => '2024-03-12 12:09:09',
                'url' => '/register',
            ),
        ));
        
        
    }
}