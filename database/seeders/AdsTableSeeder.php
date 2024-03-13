<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ads')->delete();
        
        \DB::table('ads')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 12:01:12',
                'home_middle_ad' => 'https://laravelnews.loc/uploads/HtEwP3EPwzx0JKbeJEIue8W4qUBscB.jpg',
                'home_middle_ad_status' => 1,
                'home_middle_ad_url' => NULL,
                'home_top_bar_ad' => 'https://laravelnews.loc/uploads/sMQDPwe2DPy71ipAAbdaD8CCShvjoi.jpg',
                'home_top_bar_ad_status' => 1,
                'home_top_bar_ad_url' => NULL,
                'id' => 1,
                'news_page_ad' => 'https://laravelnews.loc/uploads/M34dE9RWkr00iwa6YMqHQU62vsdBzb.jpg',
                'news_page_ad_status' => 1,
                'news_page_ad_url' => NULL,
                'side_bar_ad' => 'https://laravelnews.loc/uploads/h0Ibqt29hfV6HnKaa1zj7MYHFqbvcK.jpeg',
                'side_bar_ad_status' => 1,
                'side_bar_ad_url' => NULL,
                'updated_at' => '2024-03-12 21:16:59',
                'view_page_ad' => 'https://laravelnews.loc/uploads/zJbPs6jCrakqe2QGexkUpUqdvfX9sx.jpg',
                'view_page_ad_status' => 1,
                'view_page_ad_url' => NULL,
            ),
        ));
        
        
    }
}