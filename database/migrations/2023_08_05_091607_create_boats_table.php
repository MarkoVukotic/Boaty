<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->string('model',100);
            $table->unsignedSmallInteger('production_year');
            $table->unsignedTinyInteger('capacity');
            $table->unsignedTinyInteger('booked_capacity')->default(0);
            $table->enum('tour', ['Blue cave', 'Perast'])->default(null);
            $table->unsignedSmallInteger('blue_cave_private');
            $table->unsignedSmallInteger('perast_private');
            $table->unsignedTinyInteger('blue_cave_group');
            $table->unsignedTinyInteger('price_by_hour');
            $table->boolean('availability')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('boats');
    }
};
