<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WikiPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_user_id')
                ->unsigned()
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('updater_user_id')
                ->unsigned()
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::table('pages', function($table) {
            $table->foreign('creator_user_id')->references('id')->on('users');
            $table->foreign('updater_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('pages');
    }
}
