<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'author_id' => 1,
                'category_id' => 29,
                'created_at' => '2024-03-10 23:45:17',
                'id' => 3,
                'image' => 'uploads/Q3cISciLoKQCKANCZ5cRUa9xamNbTI.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'dream-lifestyle-crafting-a-personalized-path-to-success',
                'status' => 1,
                'updated_at' => '2024-03-10 23:45:17',
                'views' => 0,
            ),
            1 => 
            array (
                'author_id' => 1,
                'category_id' => 29,
                'created_at' => '2024-03-10 23:52:51',
                'id' => 4,
                'image' => 'uploads/i3BGMBjLegSNfVS88jSWR3qE3mIFvs.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 0,
                'show_at_popular' => 0,
                'show_at_slider' => 0,
                'slug' => 'sporting-greatness-lessons-from-legendary-athletes',
                'status' => 1,
                'updated_at' => '2024-03-12 23:38:34',
                'views' => 1,
            ),
            2 => 
            array (
                'author_id' => 1,
                'category_id' => 29,
                'created_at' => '2024-03-10 23:55:49',
                'id' => 5,
                'image' => 'uploads/urOYwlfDwQOz53WBlnGrQYkK9fvHAL.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 0,
                'show_at_popular' => 0,
                'show_at_slider' => 0,
                'slug' => 'achieving-sporting-greatness-lessons-from-legendary-athletes',
                'status' => 1,
                'updated_at' => '2024-03-12 23:38:18',
                'views' => 1,
            ),
            3 => 
            array (
                'author_id' => 1,
                'category_id' => 31,
                'created_at' => '2024-03-10 23:58:12',
                'id' => 6,
                'image' => 'uploads/m74WYyJ4tMahksBfITQiTqgeOdAuJ6.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 0,
                'show_at_popular' => 0,
                'show_at_slider' => 0,
                'slug' => 'from-campaigns-to-change-inspiring-political-movements-and-their-legacies',
                'status' => 1,
                'updated_at' => '2024-03-10 23:58:12',
                'views' => 0,
            ),
            4 => 
            array (
                'author_id' => 1,
                'category_id' => 31,
                'created_at' => '2024-03-11 00:08:20',
                'id' => 7,
                'image' => 'uploads/qLhEBAUVnPYasks7c1Kg9G30zqLYO2.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 0,
                'show_at_popular' => 0,
                'show_at_slider' => 0,
                'slug' => 'the-power-of-policy-shaping-societies-through-effective-governance',
                'status' => 1,
                'updated_at' => '2024-03-11 00:08:20',
                'views' => 0,
            ),
            5 => 
            array (
                'author_id' => 1,
                'category_id' => 31,
                'created_at' => '2024-03-11 00:10:56',
                'id' => 8,
                'image' => 'uploads/sgjMs48soi4A7whoGzj7NAoBD2CzY0.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 0,
                'show_at_popular' => 0,
                'show_at_slider' => 0,
                'slug' => 'navigating-the-political-landscape-strategies-for-effective-advocacy',
                'status' => 1,
                'updated_at' => '2024-03-12 13:40:59',
                'views' => 1,
            ),
            6 => 
            array (
                'author_id' => 1,
                'category_id' => 31,
                'created_at' => '2024-03-11 00:12:56',
                'id' => 9,
                'image' => 'uploads/nFPXAJ2v8zPZzvLaSEqq5q6qqlLjOu.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 0,
                'show_at_popular' => 0,
                'show_at_slider' => 0,
                'slug' => 'the-dynamics-of-political-leadership-insights-from-visionary-statesmen',
                'status' => 1,
                'updated_at' => '2024-03-11 00:12:56',
                'views' => 0,
            ),
            7 => 
            array (
                'author_id' => 1,
                'category_id' => 30,
                'created_at' => '2024-03-11 00:25:21',
                'id' => 10,
                'image' => 'uploads/wD6msJyfeY3a75aViRnKWkK0iiIQwc.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'designing-your-dream-lifestyle-crafting-a-personalized-path-to-success',
                'status' => 1,
                'updated_at' => '2024-03-11 00:25:21',
                'views' => 0,
            ),
            8 => 
            array (
                'author_id' => 1,
                'category_id' => 30,
                'created_at' => '2024-03-11 00:37:00',
                'id' => 11,
                'image' => 'uploads/Wqf11450hD5giyEzdmOEajBgFQSRxc.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'mindfulness-in-everyday-life-cultivating-inner-peace-and-happiness',
                'status' => 1,
                'updated_at' => '2024-03-11 00:37:00',
                'views' => 0,
            ),
            9 => 
            array (
                'author_id' => 1,
                'category_id' => 30,
                'created_at' => '2024-03-11 00:57:55',
                'id' => 12,
                'image' => 'uploads/rG514do7mb531imTqXsMvTaRc983I0.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'the-art-of-work-life-balance-nurturing-harmony-in-a-fast-paced-world',
                'status' => 1,
                'updated_at' => '2024-03-11 00:57:55',
                'views' => 0,
            ),
            10 => 
            array (
                'author_id' => 1,
                'category_id' => 30,
                'created_at' => '2024-03-11 01:00:57',
                'id' => 13,
                'image' => 'uploads/GCGiWp6IFnHdU1dXdeh2z5fAhTEicq.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'breaking-barriers-innovations-in-virtual-and-hybrid-event-experiences',
                'status' => 1,
                'updated_at' => '2024-03-11 01:00:57',
                'views' => 0,
            ),
            11 => 
            array (
                'author_id' => 1,
                'category_id' => 29,
                'created_at' => '2024-03-11 01:03:28',
                'id' => 14,
                'image' => 'uploads/4hnnCJvrCz4pP4EtyEzTrSrf7zk8UO.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'behind-the-scenes-the-art-of-seamless-event-execution',
                'status' => 1,
                'updated_at' => '2024-03-11 01:03:28',
                'views' => 0,
            ),
            12 => 
            array (
                'author_id' => 1,
                'category_id' => 29,
                'created_at' => '2024-03-11 01:05:47',
                'id' => 15,
                'image' => 'uploads/fkp9BGtMeihnCYJbYQFLeuJy2i15zP.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'mastering-event-marketing-strategies-to-boost-attendance-and-engagement',
                'status' => 1,
                'updated_at' => '2024-03-12 21:19:09',
                'views' => 1,
            ),
            13 => 
            array (
                'author_id' => 1,
                'category_id' => 29,
                'created_at' => '2024-03-11 01:08:09',
                'id' => 16,
                'image' => 'uploads/jaQgeDMycWwkgBd364gLM2paYKUgXZ.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'creating-memorable-experiences-unleashing-the-magic-of-event-planning',
                'status' => 1,
                'updated_at' => '2024-03-12 23:37:51',
                'views' => 1,
            ),
            14 => 
            array (
                'author_id' => 1,
                'category_id' => 28,
                'created_at' => '2024-03-11 01:10:43',
                'id' => 17,
                'image' => 'uploads/o6qvWLrOStY1ZJ6DAKr1MYRnEydt7U.jpeg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'driving-profitability-effective-financial-management-for-businesses',
                'status' => 1,
                'updated_at' => '2024-03-12 21:01:04',
                'views' => 2,
            ),
            15 => 
            array (
                'author_id' => 1,
                'category_id' => 28,
                'created_at' => '2024-03-11 01:12:40',
                'id' => 18,
                'image' => 'uploads/IWCZ9ofCRUcox1w6byrWkL4RrPYKQn.jpeg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'from-startups-to-success-lessons-from-innovative-business-ventures',
                'status' => 1,
                'updated_at' => '2024-03-12 12:22:01',
                'views' => 1,
            ),
            16 => 
            array (
                'author_id' => 1,
                'category_id' => 28,
                'created_at' => '2024-03-11 01:14:27',
                'id' => 19,
                'image' => 'uploads/qsJXE5NPVVYR3h8NC2vnAoNoEvF4Qn.jpeg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'navigating-the-competitive-landscape-insights-for-small-business-growth',
                'status' => 1,
                'updated_at' => '2024-03-12 21:12:00',
                'views' => 1,
            ),
            17 => 
            array (
                'author_id' => 1,
                'category_id' => 28,
                'created_at' => '2024-03-11 01:16:04',
                'id' => 20,
                'image' => 'uploads/jpOY7DTxzGzK9grGD7FY4OCVXHwyUB.jpg',
                'is_approved' => 1,
                'is_breaking_news' => 1,
                'show_at_popular' => 1,
                'show_at_slider' => 1,
                'slug' => 'unlocking-entrepreneurial-success-strategies-for-building-a-thriving-business',
                'status' => 1,
                'updated_at' => '2024-03-12 22:45:48',
                'views' => 3,
            ),
        ));
        
        
    }
}