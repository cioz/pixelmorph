<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('set_id');
            $table->integer('position');
            $table->char('title');
            $table->char('artist');
        });
    }

    public function down()
    {
        Schema::drop('playlists');
    }
}
