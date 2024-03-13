<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_infos')->delete();
        
        \DB::table('footer_infos')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 12:07:07',
                'id' => 1,
                'logo' => 'uploads/O1y4qysa2WPxW0lUQSUNeHlbnsXJ8p.png',
                'updated_at' => '2024-03-12 12:07:07',
            ),
        ));
        
        
    }
}