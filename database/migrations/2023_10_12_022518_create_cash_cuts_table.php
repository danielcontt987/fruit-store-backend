<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashCutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_cuts', function (Blueprint $table) {
            $table->id();
            $table->double('amount')->default(0.00);
            $table->double('current')->default(0.00);
            $table->double('current_mount')->default(0.00);
            $table->double('difference')->default(0.00);
            $table->double('little_box')->default(0.00);
            $table->string('observations')->nullable();
            $table->integer('folio');
            $table->double('real_cash')->default(0.00);
            $table->double('real_card')->default(0.00);
            $table->double('real_check')->default(0.00);
            $table->double('real_transfer')->default(0.00);
            $table->double('total_accumulator')->default(0.00);
            $table->dateTime('date_opening');
            $table->dateTime('date_close')->nullable();
            $table->unsignedBigInteger('salebox_id');
            $table->foreign('salebox_id')->references('id')->on('saleboxes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('business');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_cuts');
    }
}
