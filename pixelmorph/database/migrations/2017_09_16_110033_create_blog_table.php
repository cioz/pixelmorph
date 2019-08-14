<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{

    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blogcat');
            $table->tinyInteger('active');
            $table->integer('user');
            $table->char('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('blog');
    }
}
