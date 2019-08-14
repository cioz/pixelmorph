<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWgUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wg_users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('wg_gesucht_id');
            $table->text('desc');
            $table->text('profiles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('wg_users');
    }
}
