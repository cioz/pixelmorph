<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WgUsersTableSeeder extends Seeder
{
  public function run()
  {
      DB::table('wg_users')->delete();
      DB::table('wg_users')->insert(array(
          0 => array(
              'wg_gesucht_id' => '77',
              'desc' => 'profile 1 bla',
              'profiles' => '1,2,3',
              'created_at' => '2017-09-09 03:51:05',
              'updated_at' => '2017-09-09 03:51:05'
          ),
          1 => array(
            'wg_gesucht_id' => '77',
            'desc' => 'profile 2 bla',
            'profiles' => '1,2,3',
            'created_at' => '2017-09-09 03:51:05',
            'updated_at' => '2017-09-09 03:51:05'
          ),
          3 => array(
            'wg_gesucht_id' => '77',
            'desc' => 'profile 3 bla',
            'profiles' => '1,2,3',
            'created_at' => '2017-09-09 03:51:05',
            'updated_at' => '2017-09-09 03:51:05'
          )
      ));
  }
}
