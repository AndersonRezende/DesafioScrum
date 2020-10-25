<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Client;
use App\Models\Purchase;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$product = Product::findOrFail($request->product);
    	if($product->amount > 0)
    	{
    		$product->amount = strval($product->amount - 1);
    		if($product->save())
    		{
    			$purchase = new Purchase();
    			$purchase->value = $product->value;
    			$purchase->product_id = $product->id;
    			$purchase->client_id = Auth::user()->id;
    			if($purchase->save())
    				return redirect()->route('client.homepage')->with('status', 'Compra realizada com sucesso!');
    			else
    				return redirect()->route('client.homepage')->withErrors(['Ocorreu uma falha ao tentar realizar a compra!']); 	
    		}
    		else
    			return redirect()->route('client.homepage')->withErrors(['Ocorreu uma falha ao tentar realizar a compra!']); 
    	}
    	else
    		return redirect()->route('client.homepage')->withErrors(['A compra não foi realizada, pois não há mais estoque desse item!']); 
    }
}
