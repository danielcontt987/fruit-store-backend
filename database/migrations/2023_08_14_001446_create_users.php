<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('telephone');
            $table->string('image')->nullable();
            $table->string('email');
            $table->string('password');
            $table->boolean('is_edit')->default(false);
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->integer('int')->nullable();
            $table->integer('ext');
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->enum('type_user',['admin', 'employee'])->default('employee');
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('business');
            $table->unsignedBigInteger('colony_id');
            $table->foreign('colony_id')->references('id')->on('colonies');
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
        Schema::dropIfExists('users');
    }
}
