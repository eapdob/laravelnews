<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-21 10:45:57',
                'guard_name' => 'admin',
                'id' => 8,
                'name' => 'Super Admin',
                'updated_at' => '2024-02-21 10:45:57',
            ),
            1 => 
            array (
                'created_at' => '2024-02-28 11:50:50',
                'guard_name' => 'admin',
                'id' => 9,
                'name' => 'editor',
                'updated_at' => '2024-02-28 11:50:50',
            ),
            2 => 
            array (
                'created_at' => '2024-02-28 17:57:21',
                'guard_name' => 'admin',
                'id' => 10,
                'name' => 'content',
                'updated_at' => '2024-02-28 17:57:21',
            ),
        ));
        
        
    }
}