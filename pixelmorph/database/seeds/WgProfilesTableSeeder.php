<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WgProfilesTableSeeder extends Seeder
{
  public function run()
  {
      DB::table('wg_profiles')->delete();
      DB::table('wg_profiles')->insert(array(
          0 => array(
              'active' => 1,
              'title' => 'profile 1',
              'content' => 'profile content 1',
              'created_at' => '2017-09-09 03:51:05',
              'updated_at' => '2017-09-09 03:51:05'
          ),
          1 => array(
            'active' => 1,
            'title' => 'profile 2',
            'content' => 'profile content 2',
            'created_at' => '2017-09-09 03:51:05',
            'updated_at' => '2017-09-09 03:51:05'
          ),
          3 => array(
            'active' => 1,
            'title' => 'profile 3',
            'content' => 'profile content 3',
            'created_at' => '2017-09-09 03:51:05',
            'updated_at' => '2017-09-09 03:51:05'
          )
      ));
  }
}
