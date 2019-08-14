<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSetsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tags_sets')->delete();
        DB::table('tags_sets')->insert(array(
            0 => array(
                'setid' => '1',
                'tag' => '3',
                'rate' => '4',
            ),
            1 => array(
                'setid' => '1',
                'tag' => '4',
                'rate' => '4',
            ),
            2 => array(
                'setid' => '1',
                'tag' => '5',
                'rate' => '9',
            ),
            3 => array(
                'setid' => '1',
                'tag' => '9',
                'rate' => '6',
            ),
            4 => array(
                'setid' => '1',
                'tag' => '11',
                'rate' => '10',
            ),
            5 => array(
                'setid' => '2',
                'tag' => '5',
                'rate' => '8',
            ),
            6 => array(
                'setid' => '2',
                'tag' => '1',
                'rate' => '7'
            ),
            7 => array(
                'setid' => '6',
                'tag' => '5',
                'rate' => '4'
            ),
            8 => array(
                'setid' => '3',
                'tag' => '2',
                'rate' => '7'
            ),
            9 => array(
                'setid' => '3',
                'tag' => '4',
                'rate' => '7'
            ),
            10 => array(
                'setid' => '4',
                'tag' => '5',
                'rate' => '7'
            ),
            11 => array(
                'setid' => '4',
                'tag' => '8',
                'rate' => '1'
            ),
            12 => array(
                'setid' => '4',
                'tag' => '8',
                'rate' => '3'
            ),
            13 => array(
                'setid' => '5',
                'tag' => '8',
                'rate' => '3'
            ),
            14 => array(
                'setid' => '6',
                'tag' => '2',
                'rate' => '3'
            ),
            15 => array(
                'setid' => '6',
                'tag' => '1',
                'rate' => '10'
            ),
            16 => array(
                'setid' => '7',
                'tag' => '3',
                'rate' => '5'
            )
        ));
    }
}
