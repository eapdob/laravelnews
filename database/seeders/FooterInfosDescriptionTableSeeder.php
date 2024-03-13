<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterInfosDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_infos_description')->delete();
        
        \DB::table('footer_infos_description')->insert(array (
            0 => 
            array (
                'copyright' => 'Copyright © 2023 Top News',
                'created_at' => '2024-03-12 12:07:07',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius magnam harum iure officia laudantium impedit voluptatem.',
                'footer_info_id' => 1,
                'id' => 1,
                'language_id' => 1,
                'updated_at' => '2024-03-12 12:07:07',
            ),
            1 => 
            array (
                'copyright' => 'Copyright © 2023 Top News',
                'created_at' => '2024-03-12 12:07:07',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius magnam harum iure officia laudantium impedit voluptatem.',
                'footer_info_id' => 1,
                'id' => 2,
                'language_id' => 2,
                'updated_at' => '2024-03-12 12:07:07',
            ),
        ));
        
        
    }
}