<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('telephone');
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->integer('int')->nullable();
            $table->integer('ext');
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->enum('type_user',['client'])->default('client');
            $table->unsignedBigInteger('colony_id');
            $table->foreign('colony_id')->references('id')->on('colonies');
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('business');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
}
