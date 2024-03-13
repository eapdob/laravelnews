<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subscribers')->delete();
        
        \DB::table('subscribers')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 22:17:19',
                'email' => 'hegyvetaga@mailinator.com',
                'id' => 1,
                'updated_at' => '2024-03-12 22:17:19',
            ),
        ));
        
        
    }
}