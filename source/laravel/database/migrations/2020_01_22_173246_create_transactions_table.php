<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->unsignedBigInteger('amount');
            $table->unsignedTinyInteger('status');

            $table->timestamp('transfer_time')->nullable();

            $table->index('from_user_id');
            $table->index('to_user_id');
            $table->index('status');

            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
