<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedPacketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_packet', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false);
            $table->float('amount', 8, 2)->default('0');
            $table->integer('send_quantity')->default('0')->comment('Send red packet quantity');
            $table->integer('receive_quantity')->default('0')->comment('get red packet quantity');

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
        Schema::dropIfExists('red_packet');
    }
}
