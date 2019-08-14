<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            0 => array(
                'name' => 'Admin',
                'email' => 'info@pixelmorph.de',
                'password' => bcrypt('password'),
                'superuser' => '1',
                'remember_token' => str_random(60),
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                'name' => 'Besucher',
                'email' => 'besucher@pixelmorph.de',
                'password' => bcrypt('password'),
                'superuser' => '0',
                'remember_token' => str_random(60),
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            2 => array(
                'name' => 'Gast',
                'email' => 'gast@pixelmorph.de',
                'password' => bcrypt('password'),
                'superuser' => '0',
                'remember_token' => str_random(60),
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}
