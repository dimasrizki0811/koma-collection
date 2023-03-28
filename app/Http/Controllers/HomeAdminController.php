<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $user_count = User::count();

        return view('dashboard', compact('product_count', 'user_count'));
    }
}