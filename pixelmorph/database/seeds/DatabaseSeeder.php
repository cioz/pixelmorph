<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(SkillscatsTableSeeder::class);
        $this->call(SetsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TagsSetsTableSeeder::class);
        $this->call(WgUsersTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(VitaTableSeeder::class);
        $this->call(PersosTableSeeder::class);
         */

        Eloquent::unguard();

        $path = url('/dump/pixelmorph.sql');
        $this->command->info('SQL dump: ' . $path);
        DB::unprepared(file_get_contents($path));
        $this->command->info('Ferisch!');

    }
}
