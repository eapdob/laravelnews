<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts_description')->delete();
        
        \DB::table('contacts_description')->insert(array (
            0 => 
            array (
                'address' => 'PO Box 16122 Collins Street West Victoria 8007 Australia',
                'contact_id' => 1,
                'created_at' => '2024-03-11 01:17:33',
                'id' => 1,
                'language_id' => 1,
                'updated_at' => '2024-03-11 01:17:33',
            ),
            1 => 
            array (
                'address' => 'PO Box 16122 Collins Street West Victoria 8007 Australia',
                'contact_id' => 1,
                'created_at' => '2024-03-11 01:17:33',
                'id' => 2,
                'language_id' => 2,
                'updated_at' => '2024-03-11 01:17:33',
            ),
        ));
        
        
    }
}