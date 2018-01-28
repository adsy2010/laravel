<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WikiPagesVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_version', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')
                ->unsigned()
                ->foreign('page_id')
                ->references('id')
                ->on('pages');
            $table->string('name')->unique();
            $table->binary('content');
            $table->integer('version')->default(1);
            $table->timestamps();
        });

        Schema::table('pages_version', function($table) {
            $table->foreign('page_id')->references('id')->on('pages');

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
        Schema::dropIfExists('pages_version');
    }
}
