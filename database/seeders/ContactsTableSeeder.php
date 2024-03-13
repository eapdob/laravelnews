<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-11 01:17:33',
                'email' => 'mail@example.com',
                'id' => 1,
            'phone' => '(+12) 34567 890 123',
                'updated_at' => '2024-03-11 01:17:33',
            ),
        ));
        
        
    }
}