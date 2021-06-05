<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedPacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_packets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false);
            $table->float('amount', 8, 2)->default('0');
            $table->integer('total_quantity')->default('0');
            $table->boolean('random')->default('0')->comment('0 : no random , 1 : random');

            $table->timestamps();

            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('red_packets');
    }
}
