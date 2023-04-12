<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Middleware untuk memastikan pengguna sudah login
    }

    /**
     * Menampilkan daftar wishlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id; // Mendapatkan ID user yang sedang login
        $wishlists = Wishlist::where('user_id', $user_id)->get(); // Menampilkan wishlist berdasarkan ID user yang sedang login
        return view('wishlist.index', compact('wishlists'));
    }


    /**
     * Menyimpan wishlist baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // app/Http/Controllers/WishlistController.php
    public function store($id)
    {
        // Ambil data produk
        $product = Product::find($id);

        // Proses simpan data wishlist ke dalam database
        $wishlist = new WishList();
        $wishlist->user_id = Auth::id();
        $wishlist->product_id = $product->id;
        $wishlist->name = $product->name;
        // Set atribut-atribut lainnya sesuai kebutuhan
        $wishlist->quantity = 1;
        $wishlist->price = $product->price - $product->discount_price;
        $wishlist->discount = $product->discount;
        $wishlist->images = $product->images;
        $wishlist->size = $product->size;
        $wishlist->berat = $product->berat;
        $wishlist->save();
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }



    /**
     * Menghapus wishlist.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = WishList::findOrFail($id);
        $wishlist->delete();
        return redirect()->back()->with('success', 'Wishlist berhasil dihapus.');
    }

    /**
     * Menampilkan halaman edit wishlist.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        return view('wishlist.edit', compact('wishlist'));
    }

    /**
     * Mengupdate wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
        ]);

        $wishlist->product_id = $request->product_id;
        $wishlist->user_id = $request->user_id;
        $wishlist->save();

        return redirect()->back()->with('success', 'Wishlist berhasil diperbarui.');
    }
}