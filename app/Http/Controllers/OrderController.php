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
        $order->country = $request->input('country');
        $order->origin = $request->input('origin');
        $order->name = $request->input('name');
        $order->phone_number = $request->input('phone_number');
        $order->address = $request->input('address');
        $order->kecamatan = $request->input('kecamatan');
        $order->city = $request->input('city');
        $order->province = $request->input('province');
        $order->destination = $request->input('destination');
        $order->product_id = $request->input('product_id');
        $order->user_id = $request->input('user_id');
        $order->quantity = $request->input('quantity');
        $order->weight = $request->input('weight');
        $order->total = $request->input('total');
        $order->delivery = $request->input('delivery');
        $order->status = $request->input('status');
        $order->save();
        return redirect('/cekongkir')->with('success', 'Product has been added');
    }

    public function confirm()
    {
        $cart = session()->get('cart');
        return view('customer.confirm', compact('cart'));
    }
}