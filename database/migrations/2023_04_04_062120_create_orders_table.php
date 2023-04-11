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
            $table->name();
            $table->email();
            $table->phone();
            $table->address();
            $table->id_produk();
            $table->kode_produk();
            $table->nama_produk();
            $table->jumlah();
            $table->harga();
            $table->size();
            $table->shipping_cost();
            $table->shipping();
            $table->code();
            $table->subtotal();
            $table->totalprice();
            $table->status();
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