<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'created_at' => '2024-02-28 13:43:22',
                'group_name' => 'Category Permissions',
                'guard_name' => 'admin',
                'id' => 42,
                'name' => 'category index',
                'updated_at' => '2024-02-28 13:43:22',
            ),
            1 => 
            array (
                'created_at' => '2024-02-28 13:43:22',
                'group_name' => 'Category Permissions',
                'guard_name' => 'admin',
                'id' => 43,
                'name' => 'category create',
                'updated_at' => '2024-02-28 13:43:22',
            ),
            2 => 
            array (
                'created_at' => '2024-02-28 13:43:22',
                'group_name' => 'Category Permissions',
                'guard_name' => 'admin',
                'id' => 44,
                'name' => 'category update',
                'updated_at' => '2024-02-28 13:43:22',
            ),
            3 => 
            array (
                'created_at' => '2024-02-28 13:43:22',
                'group_name' => 'Category Permissions',
                'guard_name' => 'admin',
                'id' => 45,
                'name' => 'category delete',
                'updated_at' => '2024-02-28 13:43:22',
            ),
            4 => 
            array (
                'created_at' => '2024-02-28 13:43:22',
                'group_name' => 'News Permissions',
                'guard_name' => 'admin',
                'id' => 46,
                'name' => 'news index',
                'updated_at' => '2024-02-28 13:43:22',
            ),
            5 => 
            array (
                'created_at' => '2024-02-28 13:43:23',
                'group_name' => 'News Permissions',
                'guard_name' => 'admin',
                'id' => 47,
                'name' => 'news create',
                'updated_at' => '2024-02-28 13:43:23',
            ),
            6 => 
            array (
                'created_at' => '2024-02-28 13:43:23',
                'group_name' => 'News Permissions',
                'guard_name' => 'admin',
                'id' => 48,
                'name' => 'news update',
                'updated_at' => '2024-02-28 13:43:23',
            ),
            7 => 
            array (
                'created_at' => '2024-02-28 13:43:23',
                'group_name' => 'News Permissions',
                'guard_name' => 'admin',
                'id' => 49,
                'name' => 'news delete',
                'updated_at' => '2024-02-28 13:43:23',
            ),
            8 => 
            array (
                'created_at' => '2024-02-28 13:43:23',
                'group_name' => 'News Permissions',
                'guard_name' => 'admin',
                'id' => 50,
                'name' => 'news status',
                'updated_at' => '2024-02-28 13:43:23',
            ),
            9 => 
            array (
                'created_at' => '2024-02-28 13:43:24',
                'group_name' => 'News Permissions',
                'guard_name' => 'admin',
                'id' => 51,
                'name' => 'news all-access',
                'updated_at' => '2024-02-28 13:43:24',
            ),
            10 => 
            array (
                'created_at' => '2024-02-28 13:43:24',
                'group_name' => 'About Permissions',
                'guard_name' => 'admin',
                'id' => 52,
                'name' => 'about index',
                'updated_at' => '2024-02-28 13:43:24',
            ),
            11 => 
            array (
                'created_at' => '2024-02-28 13:43:24',
                'group_name' => 'About Permissions',
                'guard_name' => 'admin',
                'id' => 53,
                'name' => 'about update',
                'updated_at' => '2024-02-28 13:43:24',
            ),
            12 => 
            array (
                'created_at' => '2024-02-28 13:43:24',
                'group_name' => 'Contact Permissions',
                'guard_name' => 'admin',
                'id' => 54,
                'name' => 'contact index',
                'updated_at' => '2024-02-28 13:43:24',
            ),
            13 => 
            array (
                'created_at' => '2024-02-28 13:43:25',
                'group_name' => 'Contact Permissions',
                'guard_name' => 'admin',
                'id' => 55,
                'name' => 'contact update',
                'updated_at' => '2024-02-28 13:43:25',
            ),
            14 => 
            array (
                'created_at' => '2024-02-28 13:43:25',
                'group_name' => 'Social Count Permissions',
                'guard_name' => 'admin',
                'id' => 56,
                'name' => 'social count index',
                'updated_at' => '2024-02-28 13:43:25',
            ),
            15 => 
            array (
                'created_at' => '2024-02-28 13:43:25',
                'group_name' => 'Social Count Permissions',
                'guard_name' => 'admin',
                'id' => 57,
                'name' => 'social count create',
                'updated_at' => '2024-02-28 13:43:25',
            ),
            16 => 
            array (
                'created_at' => '2024-02-28 13:43:25',
                'group_name' => 'Social Count Permissions',
                'guard_name' => 'admin',
                'id' => 58,
                'name' => 'social count update',
                'updated_at' => '2024-02-28 13:43:25',
            ),
            17 => 
            array (
                'created_at' => '2024-02-28 13:43:26',
                'group_name' => 'Social Count Permissions',
                'guard_name' => 'admin',
                'id' => 59,
                'name' => 'social count delete',
                'updated_at' => '2024-02-28 13:43:26',
            ),
            18 => 
            array (
                'created_at' => '2024-02-28 13:43:26',
                'group_name' => 'Contact Message Permissions',
                'guard_name' => 'admin',
                'id' => 60,
                'name' => 'contact message index',
                'updated_at' => '2024-02-28 13:43:26',
            ),
            19 => 
            array (
                'created_at' => '2024-02-28 13:43:26',
                'group_name' => 'Contact Message Permissions',
                'guard_name' => 'admin',
                'id' => 61,
                'name' => 'contact message delete',
                'updated_at' => '2024-02-28 13:43:26',
            ),
            20 => 
            array (
                'created_at' => '2024-02-28 13:43:26',
                'group_name' => 'Home Section Setting Permissions',
                'guard_name' => 'admin',
                'id' => 62,
                'name' => 'home section index',
                'updated_at' => '2024-02-28 13:43:26',
            ),
            21 => 
            array (
                'created_at' => '2024-02-28 13:43:27',
                'group_name' => 'Home Section Setting Permissions',
                'guard_name' => 'admin',
                'id' => 63,
                'name' => 'home section update',
                'updated_at' => '2024-02-28 13:43:27',
            ),
            22 => 
            array (
                'created_at' => '2024-02-28 13:43:27',
                'group_name' => 'Advertisement Permissions',
                'guard_name' => 'admin',
                'id' => 64,
                'name' => 'advertisement index',
                'updated_at' => '2024-02-28 13:43:27',
            ),
            23 => 
            array (
                'created_at' => '2024-02-28 13:43:27',
                'group_name' => 'Advertisement Permissions',
                'guard_name' => 'admin',
                'id' => 65,
                'name' => 'advertisement update',
                'updated_at' => '2024-02-28 13:43:27',
            ),
            24 => 
            array (
                'created_at' => '2024-02-28 13:43:27',
                'group_name' => 'Languages Permissions',
                'guard_name' => 'admin',
                'id' => 66,
                'name' => 'languages index',
                'updated_at' => '2024-02-28 13:43:27',
            ),
            25 => 
            array (
                'created_at' => '2024-02-28 13:43:28',
                'group_name' => 'Languages Permissions',
                'guard_name' => 'admin',
                'id' => 67,
                'name' => 'languages create',
                'updated_at' => '2024-02-28 13:43:28',
            ),
            26 => 
            array (
                'created_at' => '2024-02-28 13:43:28',
                'group_name' => 'Languages Permissions',
                'guard_name' => 'admin',
                'id' => 68,
                'name' => 'languages update',
                'updated_at' => '2024-02-28 13:43:28',
            ),
            27 => 
            array (
                'created_at' => '2024-02-28 13:43:28',
                'group_name' => 'Languages Permissions',
                'guard_name' => 'admin',
                'id' => 69,
                'name' => 'languages delete',
                'updated_at' => '2024-02-28 13:43:28',
            ),
            28 => 
            array (
                'created_at' => '2024-02-28 13:43:28',
                'group_name' => 'Subscribers Permissions',
                'guard_name' => 'admin',
                'id' => 70,
                'name' => 'subscribers index',
                'updated_at' => '2024-02-28 13:43:28',
            ),
            29 => 
            array (
                'created_at' => '2024-02-28 13:43:29',
                'group_name' => 'Subscribers Permissions',
                'guard_name' => 'admin',
                'id' => 71,
                'name' => 'subscribers delete',
                'updated_at' => '2024-02-28 13:43:29',
            ),
            30 => 
            array (
                'created_at' => '2024-02-28 13:43:29',
                'group_name' => 'Footer Permissions',
                'guard_name' => 'admin',
                'id' => 72,
                'name' => 'footer index',
                'updated_at' => '2024-02-28 13:43:29',
            ),
            31 => 
            array (
                'created_at' => '2024-02-28 13:43:29',
                'group_name' => 'Footer Permissions',
                'guard_name' => 'admin',
                'id' => 73,
                'name' => 'footer create',
                'updated_at' => '2024-02-28 13:43:29',
            ),
            32 => 
            array (
                'created_at' => '2024-02-28 13:43:29',
                'group_name' => 'Footer Permissions',
                'guard_name' => 'admin',
                'id' => 74,
                'name' => 'footer update',
                'updated_at' => '2024-02-28 13:43:29',
            ),
            33 => 
            array (
                'created_at' => '2024-02-28 13:43:30',
                'group_name' => 'Footer Permissions',
                'guard_name' => 'admin',
                'id' => 75,
                'name' => 'footer delete',
                'updated_at' => '2024-02-28 13:43:30',
            ),
            34 => 
            array (
                'created_at' => '2024-02-28 13:43:30',
                'group_name' => 'Access Management Permissions',
                'guard_name' => 'admin',
                'id' => 76,
                'name' => 'access management index',
                'updated_at' => '2024-02-28 13:43:30',
            ),
            35 => 
            array (
                'created_at' => '2024-02-28 13:43:30',
                'group_name' => 'Access Management Permissions',
                'guard_name' => 'admin',
                'id' => 77,
                'name' => 'access management create',
                'updated_at' => '2024-02-28 13:43:30',
            ),
            36 => 
            array (
                'created_at' => '2024-02-28 13:43:30',
                'group_name' => 'Access Management Permissions',
                'guard_name' => 'admin',
                'id' => 78,
                'name' => 'access management update',
                'updated_at' => '2024-02-28 13:43:30',
            ),
            37 => 
            array (
                'created_at' => '2024-02-28 13:43:31',
                'group_name' => 'Access Management Permissions',
                'guard_name' => 'admin',
                'id' => 79,
                'name' => 'access management delete',
                'updated_at' => '2024-02-28 13:43:31',
            ),
            38 => 
            array (
                'created_at' => '2024-02-28 13:43:31',
                'group_name' => 'Settings Permissions',
                'guard_name' => 'admin',
                'id' => 80,
                'name' => 'setting index',
                'updated_at' => '2024-02-28 13:43:31',
            ),
            39 => 
            array (
                'created_at' => '2024-02-28 13:45:02',
                'group_name' => 'Settings Permissions',
                'guard_name' => 'admin',
                'id' => 81,
                'name' => 'setting update',
                'updated_at' => '2024-02-28 13:45:02',
            ),
        ));
        
        
    }
}