<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'comment' => 'Dolores anim quaerat nesciunt est fugit sapiente sit voluptatem Irure architecto aliqua Magnam eum qui autem molestiae',
                'created_at' => '2024-03-12 22:45:39',
                'id' => 1,
                'news_id' => 20,
                'parent_id' => NULL,
                'updated_at' => '2024-03-12 22:45:39',
                'user_id' => 1,
            ),
            1 => 
            array (
                'comment' => 'ttttttttttttt',
                'created_at' => '2024-03-12 22:46:14',
                'id' => 2,
                'news_id' => 20,
                'parent_id' => 1,
                'updated_at' => '2024-03-12 22:46:14',
                'user_id' => 2,
            ),
            2 => 
            array (
                'comment' => 'ttt',
                'created_at' => '2024-03-12 22:46:20',
                'id' => 3,
                'news_id' => 20,
                'parent_id' => NULL,
                'updated_at' => '2024-03-12 22:46:20',
                'user_id' => 2,
            ),
            3 => 
            array (
                'comment' => 'aaaaaaa',
                'created_at' => '2024-03-12 22:46:29',
                'id' => 4,
                'news_id' => 20,
                'parent_id' => 3,
                'updated_at' => '2024-03-12 22:46:29',
                'user_id' => 1,
            ),
        ));
        
        
    }
}