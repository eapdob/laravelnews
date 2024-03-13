<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 46,
                'role_id' => 9,
            ),
            1 => 
            array (
                'permission_id' => 47,
                'role_id' => 9,
            ),
            2 => 
            array (
                'permission_id' => 48,
                'role_id' => 9,
            ),
            3 => 
            array (
                'permission_id' => 49,
                'role_id' => 9,
            ),
            4 => 
            array (
                'permission_id' => 42,
                'role_id' => 10,
            ),
            5 => 
            array (
                'permission_id' => 43,
                'role_id' => 10,
            ),
            6 => 
            array (
                'permission_id' => 44,
                'role_id' => 10,
            ),
            7 => 
            array (
                'permission_id' => 46,
                'role_id' => 10,
            ),
            8 => 
            array (
                'permission_id' => 47,
                'role_id' => 10,
            ),
            9 => 
            array (
                'permission_id' => 48,
                'role_id' => 10,
            ),
            10 => 
            array (
                'permission_id' => 50,
                'role_id' => 10,
            ),
            11 => 
            array (
                'permission_id' => 51,
                'role_id' => 10,
            ),
            12 => 
            array (
                'permission_id' => 52,
                'role_id' => 10,
            ),
            13 => 
            array (
                'permission_id' => 53,
                'role_id' => 10,
            ),
            14 => 
            array (
                'permission_id' => 57,
                'role_id' => 10,
            ),
            15 => 
            array (
                'permission_id' => 58,
                'role_id' => 10,
            ),
            16 => 
            array (
                'permission_id' => 62,
                'role_id' => 10,
            ),
            17 => 
            array (
                'permission_id' => 63,
                'role_id' => 10,
            ),
            18 => 
            array (
                'permission_id' => 64,
                'role_id' => 10,
            ),
            19 => 
            array (
                'permission_id' => 65,
                'role_id' => 10,
            ),
            20 => 
            array (
                'permission_id' => 66,
                'role_id' => 10,
            ),
            21 => 
            array (
                'permission_id' => 67,
                'role_id' => 10,
            ),
            22 => 
            array (
                'permission_id' => 68,
                'role_id' => 10,
            ),
            23 => 
            array (
                'permission_id' => 70,
                'role_id' => 10,
            ),
            24 => 
            array (
                'permission_id' => 72,
                'role_id' => 10,
            ),
            25 => 
            array (
                'permission_id' => 73,
                'role_id' => 10,
            ),
            26 => 
            array (
                'permission_id' => 74,
                'role_id' => 10,
            ),
        ));
        
        
    }
}