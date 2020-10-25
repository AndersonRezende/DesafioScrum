<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->value = $request->value;
        if($product->save())
        {
            foreach($request->fileitems as $fileitem)
            {
                $productDetail = new ProductDetail();
                $productDetail->filename = $fileitem->store('products'.DIRECTORY_SEPARATOR.$product->id);
                $productDetail->product_id = $product->id;
                $productDetail->save();

                unset($productDetail);
            }
            return redirect()->route('products.index')->with('status', 'Produto cadastrado com sucesso!');
        }
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->level_id = intval($request->level);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save())
            return redirect()->route('products.index')->with('status', 'Usuário atualizado com sucesso!');
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->delete())
            return redirect()->route('products.index')->with('status','Produto deletado com sucesso!');
        else
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);   
    }
}
