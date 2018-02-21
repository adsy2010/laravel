<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'subject', 'short_content', 'content', 'posted_by'
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('short_content');
            $table->text('content');
            $table->integer('posted_by')
                ->unsigned()
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });

        Schema::table('news', function ($table){
            $table->foreign('posted_by')->references('id')->on('users');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
