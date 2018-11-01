<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->integer('following_user_id')->unsigned();
            $table->integer('followed_user_id')->unsigned();
            $table->timestamps();

            //foreign key
            $table->foreign('following_user_id')->references('id')->on('users');
            $table->foreign('followed_user_id')->references('id')->on('users');

            //primary key
            $table->unique(['following_user_id','followed_user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
