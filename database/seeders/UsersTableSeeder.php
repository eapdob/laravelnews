<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-12 22:45:02',
                'email' => 'eapdob2@gmail.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'test',
                'password' => '$2y$10$2gZRtm9t3.UUybhCDQV7XO3guy0Dn6/XyqY/W7VLveykCvgPF9ctS',
                'remember_token' => NULL,
                'updated_at' => '2024-03-12 22:45:02',
            ),
            1 => 
            array (
                'created_at' => '2024-03-12 22:46:03',
                'email' => 'eapdob3@gmail.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'name' => 'tt',
                'password' => '$2y$10$ub7/mwKYPliyZlFZgEeSI.YrqnH82yICfZgQsVYGBa4TIMJu9bm6O',
                'remember_token' => NULL,
                'updated_at' => '2024-03-12 22:46:03',
            ),
        ));
        
        
    }
}