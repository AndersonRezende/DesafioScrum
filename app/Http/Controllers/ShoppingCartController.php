<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Client;
use Auth;

class ShoppingCartController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $client = Client::findOrFail(Auth::user()->id);
        return view('shoppingcarts.create', ['product' => $product, 'client' => $client]);
    }
}
