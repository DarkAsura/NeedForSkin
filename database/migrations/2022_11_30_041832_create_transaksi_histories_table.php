<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_histories', function (Blueprint $table) {
            $table->id('TransaksiHistoryID');
            $table->foreignId("UserID")->references('UserID')->on('users');
            $table->foreignId('TransaksiID')->references('TransaksiID')->on('transaksis');
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
        Schema::dropIfExists('transaksi_histories');
    }
}
