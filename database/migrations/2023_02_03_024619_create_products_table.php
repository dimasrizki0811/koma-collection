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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('code')->unique();
            $table->text('description');
            $table->string('stock');
            $table->string('berat');
            $table->string('size');
            $table->string('images')->nullable();
            $table->string('category');
            $table->boolean('discount')->default(0);
            $table->double('discount_price')->nullable();
            $table->double('total_disc')->nullable();
            $table->dateTime('start_discount')->nullable();
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
        Schema::dropIfExists('products');
    }
};