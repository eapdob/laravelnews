<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterGridThreesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_grid_threes')->delete();
        
        \DB::table('footer_grid_threes')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:11:45',
                'id' => 3,
                'status' => 1,
                'updated_at' => '2024-03-12 12:11:45',
                'url' => '#',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:12:02',
                'id' => 4,
                'status' => 1,
                'updated_at' => '2024-03-12 12:12:02',
                'url' => '#',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:12:18',
                'id' => 5,
                'status' => 1,
                'updated_at' => '2024-03-12 12:12:18',
                'url' => '#',
            ),
        ));
        
        
    }
}