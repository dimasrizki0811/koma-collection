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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('origin');
            $table->string('name')->require();
            $table->double('phone_number')->require();
            $table->string('address')->require();
            $table->string('kecamatan')->require();
            $table->string('city')->require();
            $table->string('province')->require();
            $table->string('destination')->require();
            $table->integer('product_id');
            $table->integer('user_id');
            $table->double('quantity');
            $table->double('weight');
            $table->double('total');
            $table->string('delivery');
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
};