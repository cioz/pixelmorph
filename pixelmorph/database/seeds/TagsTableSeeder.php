<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tags')->delete();
        DB::table('tags')->insert(array(
            0 => array(
                'title' => 'Fast',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            1 => array(
                'title' => 'Hardbeat',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            2 => array(
                'title' => 'Slow',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            3 => array(
                'title' => 'Softbeat',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            4 => array(
                'title' => 'Melodic',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            5 => array(
                'title' => 'Progessive',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            6 => array(
                'title' => 'Deep',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            7 => array(
                'title' => 'Mellow',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            8 => array(
                'title' => 'Chillout',
                'description' => 'Sphärische, sanfte, langgezogene und warme Klänge dominieren. Rhythmus und Perkussion stehen im Hintergrund oder fehlen.',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            9 => array(
                'title' => 'Ambient',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            10 => array(
                'title' => 'Ethno',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            11 => array(
                'title' => 'Groove',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            12 => array(
                'title' => 'Experimental',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            13 => array(
                'title' => 'Mystic',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            14 => array(
                'title' => 'Dark',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            15 => array(
                'title' => 'Technic',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            )
        ));
    }
}
