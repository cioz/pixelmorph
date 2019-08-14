<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('promo')->default(0);
            $table->smallInteger('setorder')->default(1);
            $table->dateTime('released')->nullable();
            $table->char('title')->nullable();
            $table->mediumInteger('setlength')->default(0);
            $table->smallInteger('bpm')->default(0);
            $table->char('filename')->nullable();
            $table->char('filetype')->nullable();
            $table->char('cover')->nullable();
            $table->text('description')->nullable();
            $table->integer('clicks')->default(0);
            $table->integer('plays')->default(0);
            $table->integer('dls')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *
     */
    public function down()
    {
        Schema::drop('sets');
    }
}
