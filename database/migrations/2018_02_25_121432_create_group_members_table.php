<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')
                ->unsigned()
                ->foreign('group_id')
                ->references('id')
                ->on('groups');
            $table->integer('member_id')
                ->unsigned()
                ->foreign('member_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });


        Schema::table('group_members', function ($table) {
            $table->foreign('member_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('group_members');
    }
}
