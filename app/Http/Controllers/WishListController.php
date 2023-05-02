<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Parser\Handler\WhitespaceHandler;

class WishlistController extends Controller
{
    /**
     * Menampilkan daftar wishlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id; // Mendapatkan ID user yang sedang login
        $wishlists = Wishlist::where('user_id', $user_id)->get(); // Menampilkan wishlist berdasarkan ID user yang sedang login
        $sumTotal = WishList::QuantityWhislist($user_id);
        // dd($total);
        return view('wishlist.index', compact('wishlists', 'sumTotal'));
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
        $wishlist = WishList::FirstOrNew([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
        $wishlist->name = $product->name;
        // Set atribut-atribut lainnya sesuai kebutuhan
        $wishlist->quantity = 1;
        // Cek nilai diskon pada produk
        if ($product->discount == 1) {
            // Jika diskon = 1, gunakan harga promo
            $wishlist->price = $product->price - $product->discount_price;
        } else {
            // Jika diskon = 0, gunakan harga normal
            $wishlist->price = $product->price;
        }
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
        return redirect()->route('wishlist.index')->with('success', 'Wishlist successfully deleted.');
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
