<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
            array (
                'created_at' => '2024-03-10 12:01:12',
                'email' => 'eapdob@gmail.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'image' => 'uploads/3qu0wgh5TJd8HkkZmK6sCLfqKb741x.jpg',
                'name' => 'Super User',
                'password' => '$2y$10$.jgwbqmBeXy.YoNsNt2tp.WSm/aNIEe4drxJ0gH2nZLpguyAcNfUG',
                'remember_token' => NULL,
                'status' => 1,
                'updated_at' => '2024-03-12 21:05:42',
            ),
            1 =>
            array (
                'created_at' => '2024-03-02 12:24:05',
                'email' => 'eapdob1@gmail.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'image' => '',
                'name' => 'test',
                'password' => '$2y$10$NGZXcT3fdfoTPgEwaKF.u.CMRm8fy6jl8QZAs9uAe1xPYeptaXIMa',
                'remember_token' => NULL,
                'status' => 1,
                'updated_at' => '2024-03-02 12:24:05',
            ),
        ));


    }
}
