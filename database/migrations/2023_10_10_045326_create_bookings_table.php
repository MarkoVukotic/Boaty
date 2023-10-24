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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number_of_adults');
            $table->unsignedTinyInteger('number_of_kids');
            $table->unsignedTinyInteger('number_of_infants');
            $table->unsignedSmallInteger('total_price');
            $table->tinyText('departure_time');
            $table->string('additional_message', 600)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('boats_id');
            $table->enum('tour', ['Blue cave', 'Perast'])->default(null);
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('boats_id')->references('id')->on('boats');
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
        Schema::dropIfExists('bookings');
    }
};
