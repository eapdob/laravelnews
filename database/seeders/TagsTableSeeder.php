<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'created_at' => '2024-03-10 23:45:17',
                'id' => 2,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-10 23:45:17',
            ),
            1 => 
            array (
                'created_at' => '2024-03-10 23:49:07',
                'id' => 3,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-10 23:49:07',
            ),
            2 => 
            array (
                'created_at' => '2024-03-10 23:49:07',
                'id' => 4,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-10 23:49:07',
            ),
            3 => 
            array (
                'created_at' => '2024-03-10 23:49:07',
                'id' => 5,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-10 23:49:07',
            ),
            4 => 
            array (
                'created_at' => '2024-03-10 23:49:07',
                'id' => 6,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-10 23:49:07',
            ),
            5 => 
            array (
                'created_at' => '2024-03-10 23:52:51',
                'id' => 7,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-10 23:52:51',
            ),
            6 => 
            array (
                'created_at' => '2024-03-10 23:52:51',
                'id' => 8,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-10 23:52:51',
            ),
            7 => 
            array (
                'created_at' => '2024-03-10 23:52:51',
                'id' => 9,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-10 23:52:51',
            ),
            8 => 
            array (
                'created_at' => '2024-03-10 23:52:51',
                'id' => 10,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-10 23:52:51',
            ),
            9 => 
            array (
                'created_at' => '2024-03-10 23:52:51',
                'id' => 11,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-10 23:52:51',
            ),
            10 => 
            array (
                'created_at' => '2024-03-10 23:52:51',
                'id' => 12,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-10 23:52:51',
            ),
            11 => 
            array (
                'created_at' => '2024-03-10 23:55:49',
                'id' => 13,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-10 23:55:49',
            ),
            12 => 
            array (
                'created_at' => '2024-03-10 23:55:49',
                'id' => 14,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-10 23:55:49',
            ),
            13 => 
            array (
                'created_at' => '2024-03-10 23:55:49',
                'id' => 15,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-10 23:55:49',
            ),
            14 => 
            array (
                'created_at' => '2024-03-10 23:55:49',
                'id' => 16,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-10 23:55:49',
            ),
            15 => 
            array (
                'created_at' => '2024-03-10 23:55:49',
                'id' => 17,
                'language_id' => 2,
                'name' => 'Подіїї',
                'updated_at' => '2024-03-10 23:55:49',
            ),
            16 => 
            array (
                'created_at' => '2024-03-10 23:55:49',
                'id' => 18,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-10 23:55:49',
            ),
            17 => 
            array (
                'created_at' => '2024-03-10 23:58:12',
                'id' => 19,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-10 23:58:12',
            ),
            18 => 
            array (
                'created_at' => '2024-03-10 23:58:12',
                'id' => 20,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-10 23:58:12',
            ),
            19 => 
            array (
                'created_at' => '2024-03-10 23:58:12',
                'id' => 21,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-10 23:58:12',
            ),
            20 => 
            array (
                'created_at' => '2024-03-10 23:58:12',
                'id' => 22,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-10 23:58:12',
            ),
            21 => 
            array (
                'created_at' => '2024-03-10 23:58:12',
                'id' => 23,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-10 23:58:12',
            ),
            22 => 
            array (
                'created_at' => '2024-03-10 23:58:12',
                'id' => 24,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-10 23:58:12',
            ),
            23 => 
            array (
                'created_at' => '2024-03-11 00:08:20',
                'id' => 25,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 00:08:20',
            ),
            24 => 
            array (
                'created_at' => '2024-03-11 00:08:20',
                'id' => 26,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 00:08:20',
            ),
            25 => 
            array (
                'created_at' => '2024-03-11 00:08:20',
                'id' => 27,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 00:08:20',
            ),
            26 => 
            array (
                'created_at' => '2024-03-11 00:08:20',
                'id' => 28,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 00:08:20',
            ),
            27 => 
            array (
                'created_at' => '2024-03-11 00:08:20',
                'id' => 29,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 00:08:20',
            ),
            28 => 
            array (
                'created_at' => '2024-03-11 00:08:20',
                'id' => 30,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 00:08:20',
            ),
            29 => 
            array (
                'created_at' => '2024-03-11 00:10:56',
                'id' => 31,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 00:10:56',
            ),
            30 => 
            array (
                'created_at' => '2024-03-11 00:10:56',
                'id' => 32,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 00:10:56',
            ),
            31 => 
            array (
                'created_at' => '2024-03-11 00:10:56',
                'id' => 33,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 00:10:56',
            ),
            32 => 
            array (
                'created_at' => '2024-03-11 00:10:56',
                'id' => 34,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 00:10:56',
            ),
            33 => 
            array (
                'created_at' => '2024-03-11 00:10:56',
                'id' => 35,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 00:10:56',
            ),
            34 => 
            array (
                'created_at' => '2024-03-11 00:10:57',
                'id' => 36,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 00:10:57',
            ),
            35 => 
            array (
                'created_at' => '2024-03-11 00:12:56',
                'id' => 37,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 00:12:56',
            ),
            36 => 
            array (
                'created_at' => '2024-03-11 00:12:56',
                'id' => 38,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 00:12:56',
            ),
            37 => 
            array (
                'created_at' => '2024-03-11 00:12:56',
                'id' => 39,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 00:12:56',
            ),
            38 => 
            array (
                'created_at' => '2024-03-11 00:12:56',
                'id' => 40,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 00:12:56',
            ),
            39 => 
            array (
                'created_at' => '2024-03-11 00:12:56',
                'id' => 41,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 00:12:56',
            ),
            40 => 
            array (
                'created_at' => '2024-03-11 00:12:56',
                'id' => 42,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 00:12:56',
            ),
            41 => 
            array (
                'created_at' => '2024-03-11 00:25:21',
                'id' => 43,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 00:25:21',
            ),
            42 => 
            array (
                'created_at' => '2024-03-11 00:25:21',
                'id' => 44,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 00:25:21',
            ),
            43 => 
            array (
                'created_at' => '2024-03-11 00:25:21',
                'id' => 45,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 00:25:21',
            ),
            44 => 
            array (
                'created_at' => '2024-03-11 00:25:21',
                'id' => 46,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 00:25:21',
            ),
            45 => 
            array (
                'created_at' => '2024-03-11 00:25:21',
                'id' => 47,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 00:25:21',
            ),
            46 => 
            array (
                'created_at' => '2024-03-11 00:25:21',
                'id' => 48,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 00:25:21',
            ),
            47 => 
            array (
                'created_at' => '2024-03-11 00:37:00',
                'id' => 49,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 00:37:00',
            ),
            48 => 
            array (
                'created_at' => '2024-03-11 00:37:00',
                'id' => 50,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 00:37:00',
            ),
            49 => 
            array (
                'created_at' => '2024-03-11 00:37:00',
                'id' => 51,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 00:37:00',
            ),
            50 => 
            array (
                'created_at' => '2024-03-11 00:37:00',
                'id' => 52,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 00:37:00',
            ),
            51 => 
            array (
                'created_at' => '2024-03-11 00:37:00',
                'id' => 53,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 00:37:00',
            ),
            52 => 
            array (
                'created_at' => '2024-03-11 00:37:00',
                'id' => 54,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 00:37:00',
            ),
            53 => 
            array (
                'created_at' => '2024-03-11 00:57:55',
                'id' => 55,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 00:57:55',
            ),
            54 => 
            array (
                'created_at' => '2024-03-11 00:57:55',
                'id' => 56,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 00:57:55',
            ),
            55 => 
            array (
                'created_at' => '2024-03-11 00:57:55',
                'id' => 57,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 00:57:55',
            ),
            56 => 
            array (
                'created_at' => '2024-03-11 00:57:55',
                'id' => 58,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 00:57:55',
            ),
            57 => 
            array (
                'created_at' => '2024-03-11 00:57:55',
                'id' => 59,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 00:57:55',
            ),
            58 => 
            array (
                'created_at' => '2024-03-11 00:57:55',
                'id' => 60,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 00:57:55',
            ),
            59 => 
            array (
                'created_at' => '2024-03-11 01:00:57',
                'id' => 61,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:00:57',
            ),
            60 => 
            array (
                'created_at' => '2024-03-11 01:00:57',
                'id' => 62,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:00:57',
            ),
            61 => 
            array (
                'created_at' => '2024-03-11 01:00:57',
                'id' => 63,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:00:57',
            ),
            62 => 
            array (
                'created_at' => '2024-03-11 01:00:57',
                'id' => 64,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:00:57',
            ),
            63 => 
            array (
                'created_at' => '2024-03-11 01:00:57',
                'id' => 65,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:00:57',
            ),
            64 => 
            array (
                'created_at' => '2024-03-11 01:00:57',
                'id' => 66,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:00:57',
            ),
            65 => 
            array (
                'created_at' => '2024-03-11 01:03:28',
                'id' => 67,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:03:28',
            ),
            66 => 
            array (
                'created_at' => '2024-03-11 01:03:28',
                'id' => 68,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:03:28',
            ),
            67 => 
            array (
                'created_at' => '2024-03-11 01:03:28',
                'id' => 69,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:03:28',
            ),
            68 => 
            array (
                'created_at' => '2024-03-11 01:03:28',
                'id' => 70,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:03:28',
            ),
            69 => 
            array (
                'created_at' => '2024-03-11 01:03:28',
                'id' => 71,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:03:28',
            ),
            70 => 
            array (
                'created_at' => '2024-03-11 01:03:28',
                'id' => 72,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:03:28',
            ),
            71 => 
            array (
                'created_at' => '2024-03-11 01:05:47',
                'id' => 73,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:05:47',
            ),
            72 => 
            array (
                'created_at' => '2024-03-11 01:05:47',
                'id' => 74,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:05:47',
            ),
            73 => 
            array (
                'created_at' => '2024-03-11 01:05:47',
                'id' => 75,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:05:47',
            ),
            74 => 
            array (
                'created_at' => '2024-03-11 01:05:47',
                'id' => 76,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:05:47',
            ),
            75 => 
            array (
                'created_at' => '2024-03-11 01:05:47',
                'id' => 77,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:05:47',
            ),
            76 => 
            array (
                'created_at' => '2024-03-11 01:05:47',
                'id' => 78,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:05:47',
            ),
            77 => 
            array (
                'created_at' => '2024-03-11 01:08:09',
                'id' => 79,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:08:09',
            ),
            78 => 
            array (
                'created_at' => '2024-03-11 01:08:09',
                'id' => 80,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:08:09',
            ),
            79 => 
            array (
                'created_at' => '2024-03-11 01:08:09',
                'id' => 81,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:08:09',
            ),
            80 => 
            array (
                'created_at' => '2024-03-11 01:08:09',
                'id' => 82,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:08:09',
            ),
            81 => 
            array (
                'created_at' => '2024-03-11 01:08:09',
                'id' => 83,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:08:09',
            ),
            82 => 
            array (
                'created_at' => '2024-03-11 01:08:09',
                'id' => 84,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:08:09',
            ),
            83 => 
            array (
                'created_at' => '2024-03-11 01:10:43',
                'id' => 85,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:10:43',
            ),
            84 => 
            array (
                'created_at' => '2024-03-11 01:10:43',
                'id' => 86,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:10:43',
            ),
            85 => 
            array (
                'created_at' => '2024-03-11 01:10:43',
                'id' => 87,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:10:43',
            ),
            86 => 
            array (
                'created_at' => '2024-03-11 01:10:43',
                'id' => 88,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:10:43',
            ),
            87 => 
            array (
                'created_at' => '2024-03-11 01:10:43',
                'id' => 89,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:10:43',
            ),
            88 => 
            array (
                'created_at' => '2024-03-11 01:10:43',
                'id' => 90,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:10:43',
            ),
            89 => 
            array (
                'created_at' => '2024-03-11 01:12:40',
                'id' => 91,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:12:40',
            ),
            90 => 
            array (
                'created_at' => '2024-03-11 01:12:40',
                'id' => 92,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:12:40',
            ),
            91 => 
            array (
                'created_at' => '2024-03-11 01:12:40',
                'id' => 93,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:12:40',
            ),
            92 => 
            array (
                'created_at' => '2024-03-11 01:12:40',
                'id' => 94,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:12:40',
            ),
            93 => 
            array (
                'created_at' => '2024-03-11 01:12:40',
                'id' => 95,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:12:40',
            ),
            94 => 
            array (
                'created_at' => '2024-03-11 01:12:40',
                'id' => 96,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:12:40',
            ),
            95 => 
            array (
                'created_at' => '2024-03-11 01:14:27',
                'id' => 97,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:14:27',
            ),
            96 => 
            array (
                'created_at' => '2024-03-11 01:14:27',
                'id' => 98,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:14:27',
            ),
            97 => 
            array (
                'created_at' => '2024-03-11 01:14:27',
                'id' => 99,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:14:27',
            ),
            98 => 
            array (
                'created_at' => '2024-03-11 01:14:27',
                'id' => 100,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:14:27',
            ),
            99 => 
            array (
                'created_at' => '2024-03-11 01:14:27',
                'id' => 101,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:14:27',
            ),
            100 => 
            array (
                'created_at' => '2024-03-11 01:14:27',
                'id' => 102,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:14:27',
            ),
            101 => 
            array (
                'created_at' => '2024-03-11 01:16:04',
                'id' => 103,
                'language_id' => 1,
                'name' => 'Business',
                'updated_at' => '2024-03-11 01:16:04',
            ),
            102 => 
            array (
                'created_at' => '2024-03-11 01:16:04',
                'id' => 104,
                'language_id' => 1,
                'name' => 'Lifestyle',
                'updated_at' => '2024-03-11 01:16:04',
            ),
            103 => 
            array (
                'created_at' => '2024-03-11 01:16:04',
                'id' => 105,
                'language_id' => 1,
                'name' => 'Event',
                'updated_at' => '2024-03-11 01:16:04',
            ),
            104 => 
            array (
                'created_at' => '2024-03-11 01:16:04',
                'id' => 106,
                'language_id' => 2,
                'name' => 'Бізнес',
                'updated_at' => '2024-03-11 01:16:04',
            ),
            105 => 
            array (
                'created_at' => '2024-03-11 01:16:04',
                'id' => 107,
                'language_id' => 2,
                'name' => 'Стиль життя',
                'updated_at' => '2024-03-11 01:16:04',
            ),
            106 => 
            array (
                'created_at' => '2024-03-11 01:16:04',
                'id' => 108,
                'language_id' => 2,
                'name' => 'Події',
                'updated_at' => '2024-03-11 01:16:04',
            ),
        ));
        
        
    }
}