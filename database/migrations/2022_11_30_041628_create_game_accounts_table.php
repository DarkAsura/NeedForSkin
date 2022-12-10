<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_accounts', function (Blueprint $table) {
            $table->id('GameAccountID');
            $table->foreignId("UserID")->references('UserID')->on('users');
            $table->string('name');
            $table->string('image');
            $table->string('describes');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_accounts');
    }
}
