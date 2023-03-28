<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function firstFunction()
    {
        $firstData = Product::where('discount', 1)->get();
        return $firstData;
    }

    public function secondFunction()
    {
        $secondData = Product::all();
        return $secondData;
    }

    public function showPage()
    {
        $firstData = $this->firstFunction();
        $secondData = $this->secondFunction();
        return view('customer.index', compact('firstData', 'secondData'));
    }

    public function sale()
    {
        $sale = Product::where('discount', 1)->get();
        return view('onsale', compact('sale'));
    }

    public function onsale()
    {
        $onsale = Product::where('discount', 1)->get();
        return view('customer.onsale', compact('onsale'));
    }
}