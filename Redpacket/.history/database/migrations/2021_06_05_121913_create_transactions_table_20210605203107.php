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
            $table->id();

            $table->integer('user_id_send')->nullable(false);
            $table->integer('user_id_receive')->nullable(false);
            $table->integer('red_packet_id')->nullable(false);
            $table->float('amount', 8, 2)->default('0');
            $table->float('balance', 8, 2)->default('0');
            $table->float('after_balance', 8, 2)->default('0');
            $table->boolean('status')->default('0')->comment('0 : fail , 1 : succes');
            
            $table->timestamps();

            $table->index(['user_id_send','user_id_receive','red_packet_id']);

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
