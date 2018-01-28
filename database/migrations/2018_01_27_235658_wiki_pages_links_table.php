<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WikiPagesLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')
                ->unsigned()
                ->foreign('page_id')
                ->references('id')
                ->on('pages');
            $table->integer('links_to')
                ->unsigned()
                ->foreign('page_id')
                ->references('id')
                ->on('pages');
            $table->string('version');
            $table->timestamps();
        });

        Schema::table('pages_links', function($table) {
            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('links_to')->references('id')->on('pages');

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
        Schema::dropIfExists('pages_links');
    }
}
