<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Kavist\RajaOngkir\Facades\RajaOngkir;


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
    // public function check_ongkir(Request $request)
    // {


    //     dd($cost);
    //     return response()->json($cost);
    // }

    public function store(Request $request)
    {

        // validasi input
        $validated = $request->validate([
            'country' => 'required|string',
            'name' => 'required|string|max:255',
            'no_tlp' => 'required|string|max:20|min:8',
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:20',
            'city_origin' => 'required',
            'province_destination' => 'required',
            'city_destination' => 'required',
            'courier' => 'required',
        ]);
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        // menyimpan data order ke dalam session
        $order = [
            'country' => $validated['country'],
            'name' => $validated['name'],
            'no_tlp' => $validated['no_tlp'],
            'alamat' => $validated['alamat'],
            'kecamatan' => $validated['kecamatan'],
            'kode_pos' => $validated['kode_pos'],
            'user_id' => Auth::id(),
            'city_origin' => $validated['city_origin'],
            'province_destination' => $validated['province_destination'],
            'city_destination' => $validated['city_destination'],
            'courier' => $validated['courier'],
            'cost'     => $cost,
        ];
        session()->put('order', $order);

        // redirect ke halaman lain atau melakukan operasi lain
        return redirect()->route('orders.confirm')->with('success', 'Berhasil memasukan data !');
    }

    public function confirm()
    {
        $cart = session()->get('cart');
        $orders = session()->get('order');
        $ongkir = $orders['cost'][0]['costs'];
        // dd($orders);
        $province = Province::find($orders['province_destination']);
        $city = City::where('city_id', $orders['city_destination'])->get()[0];
        $produk = Product::all();
        return view('customer.confirm', compact('cart', 'produk', 'orders', 'city', 'province', 'ongkir'));
    }
}
