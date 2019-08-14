<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persos', function (Blueprint $table) {
            $table->integer('id');
            $table->char('name');
            $table->text('adress');
            $table->char('tele');
            $table->char('geb');
            $table->char('family');
            $table->char('state');
            $table->char('driver');
            $table->char('lang');
            $table->char('rel');
            $table->char('email');
            $table->text('pgp');
        });
    }

    public function down()
    {
        Schema::drop('persos');
    }
}
