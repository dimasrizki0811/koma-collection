<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\Province;
use App\Models\City;


class OrderController extends Controller
{
    public function index()
    {
        $provinces = Province::pluck('name', 'province_id');
        $cart = session()->get('cart');
        return view('customer.checkout', compact('cart', 'provinces'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }
    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        return response()->json($cost);
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->id = $request->input('id_produk');
        $order->nama_produk = $request->input('nama_produk');
        $order->jumlah = $request->input('jumlah');
        $order->harga = $request->input('harga');
        $order->size = $request->input('size');
        $order->shipping = $request->input('shipping');
        $order->shipping_cost = $request->input('shipping_cost');
        $order->code = $request->input('code');
        $order->subtotal = $request->input('subtotal');
        $order->totalPrice = $request->input('totalPrice');
        $order->status = $request->input('status');
        dd($order);

        return view('/checkout')->with('succes', 'Data succes input');
    }

    public function confirm()
    {
        $cart = session()->get('cart');
        $produk = Product::all();
        return view('customer.confirm', compact('cart', 'produk'));
    }
}