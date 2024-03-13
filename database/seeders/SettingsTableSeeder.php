<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 14:21:10',
                'id' => 1,
                'key' => 'site_name_1',
                'updated_at' => '2024-03-12 12:14:01',
                'value' => 'Top News',
            ),
            1 => 
            array (
                'created_at' => '2024-03-10 14:21:10',
                'id' => 2,
                'key' => 'site_name_2',
                'updated_at' => '2024-03-12 12:14:01',
                'value' => 'Головні новини',
            ),
            2 => 
            array (
                'created_at' => '2024-03-10 14:27:27',
                'id' => 3,
                'key' => 'site_seo_title_1',
                'updated_at' => '2024-03-10 14:30:53',
                'value' => 'abc11',
            ),
            3 => 
            array (
                'created_at' => '2024-03-10 14:27:27',
                'id' => 4,
                'key' => 'site_seo_description_1',
                'updated_at' => '2024-03-10 14:30:53',
                'value' => 'abc21',
            ),
            4 => 
            array (
                'created_at' => '2024-03-10 14:27:27',
                'id' => 5,
                'key' => 'site_seo_keywords_1',
                'updated_at' => '2024-03-10 14:30:53',
                'value' => 'abc31',
            ),
            5 => 
            array (
                'created_at' => '2024-03-10 14:27:27',
                'id' => 6,
                'key' => 'site_seo_title_2',
                'updated_at' => '2024-03-10 14:30:53',
                'value' => 'abc41',
            ),
            6 => 
            array (
                'created_at' => '2024-03-10 14:27:27',
                'id' => 7,
                'key' => 'site_seo_description_2',
                'updated_at' => '2024-03-10 14:30:53',
                'value' => 'abc51',
            ),
            7 => 
            array (
                'created_at' => '2024-03-10 14:27:27',
                'id' => 8,
                'key' => 'site_seo_keywords_2',
                'updated_at' => '2024-03-10 14:30:53',
                'value' => 'abc61',
            ),
            8 => 
            array (
                'created_at' => '2024-03-10 14:56:05',
                'id' => 9,
                'key' => 'site_logo',
                'updated_at' => '2024-03-12 12:14:01',
                'value' => 'uploads/jPcz4HJBRL6b8NdGOFlt6NvVZLtJWe.png',
            ),
            9 => 
            array (
                'created_at' => '2024-03-10 14:56:14',
                'id' => 10,
                'key' => 'site_favicon',
                'updated_at' => '2024-03-12 12:14:01',
                'value' => 'uploads/w59kwSltRp5LZVngOfw6HRzR9jqFUg.png',
            ),
            10 => 
            array (
                'created_at' => '2024-03-10 21:43:15',
                'id' => 11,
                'key' => 'site_microsoft_api_host',
                'updated_at' => '2024-03-10 21:54:28',
                'value' => 'microsoft-translator-text.p.rapidapi.com',
            ),
            11 => 
            array (
                'created_at' => '2024-03-10 21:43:15',
                'id' => 12,
                'key' => 'site_microsoft_api_key',
                'updated_at' => '2024-03-10 21:54:28',
                'value' => '9644c1868amsh7d7ad4b2feb85afp1973f8jsneb5a65f1a736',
            ),
            12 => 
            array (
                'created_at' => '2024-03-12 08:53:53',
                'id' => 13,
                'key' => 'site_color',
                'updated_at' => '2024-03-12 12:21:37',
                'value' => '#0073ff',
            ),
        ));
        
        
    }
}