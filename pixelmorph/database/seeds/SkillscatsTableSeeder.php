<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillscatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('skillscats')->delete();
        DB::table('skillscats')->insert(array(
            0 => array(
                'title' => 'Allgemein',
                'skillscats_id' => 1,
                'created_at' => '2017-09-09 04:43:00',
                'updated_at' => '2017-09-09 04:44:19',
                'active' => 1,
                'description' => '',
            ),
            1 => array(
                'title' => 'Frontend',
                'skillscats_id' => 2,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            ),
            2 => array(
                'title' => 'Frontend CSS Frameworks',
                'skillscats_id' => 3,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            ),
            3 => array(
                'title' => 'Frontend Javascript Frameworks',
                'skillscats_id' => 4,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            ),
            4 => array(
                'title' => 'Frontend CMS',
                'skillscats_id' => 5,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            ),
            5 => array(
                'title' => 'Backend',
                'skillscats_id' => 6,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            ),
            6 => array(
                'title' => 'Backend Frameworks',
                'skillscats_id' => 7,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            ),
            7 => array(
                'title' => 'Design',
                'skillscats_id' => 8,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => '',
            )
        ));
    }
}
