<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function store(Request $request, $id)
    {
        // Ambil data produk
        $product = Product::find($id);

        // Hitung harga setelah diskon
        $price = $product->price - $product->discount_price;
        $discount = $product->discount;

        // Jika user sudah login
        // Proses simpan data keranjang belanja ke dalam database
        if (session()->has('user_id')) {
            $cart = Cart::updateOrCreate([
                'user_id' => session()->get('user_id'),
                'product_id' => $product->id,
                'name' => $product->name
            ], [
                'quantity' => 1,
                'price' => $price,
                'discount' => $discount,
                'images' => $product->images,
                'size' => $product->size,
                'berat' => $product->berat,
            ]);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }


        // Jika user belum login
        // Proses simpan data keranjang belanja ke dalam session
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }
        $cart = session()->get('cart');

        // Cek apakah item sudah ada dalam keranjang belanja
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // Menambahkan item baru ke keranjang belanja

        $cart[$id] = ["product_id" => $product->id, "name" => $product->name, "quantity" => 1, "price" => $price, "discount" => $discount, "images" => $product->images, "size" => $product->size, "berat" => $product->berat];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        $cart = session()->get('cart');
        return view('customer.cart', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->update($product, $id, $request->quantity);

        Session::put('cart', $cart);
        return redirect()->route('customer.cart');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    // Wishlist //

}