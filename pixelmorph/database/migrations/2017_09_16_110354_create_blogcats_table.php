<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogcatsTable extends Migration
{

    public function up()
    {
        Schema::create('blogcats', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active');
            $table->char('title');
            $table->text('desc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('blogcats');
    }
}
