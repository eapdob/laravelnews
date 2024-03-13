<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterGridTwosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_grid_twos')->delete();
        
        \DB::table('footer_grid_twos')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:09:58',
                'id' => 10,
                'status' => 1,
                'updated_at' => '2024-03-12 12:09:58',
                'url' => '#',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 12:10:27',
                'id' => 11,
                'status' => 1,
                'updated_at' => '2024-03-12 12:10:27',
                'url' => '#',
            ),
            2 => 
            array (
                'created_at' => '2024-03-12 12:10:43',
                'id' => 12,
                'status' => 1,
                'updated_at' => '2024-03-12 12:10:43',
                'url' => '#',
            ),
        ));
        
        
    }
}