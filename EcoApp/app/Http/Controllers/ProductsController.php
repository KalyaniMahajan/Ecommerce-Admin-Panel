<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Gallery;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        return view('products.index')->with(compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('products.create')->with(compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->color = $request->color ? $request->color : '#ffffff';
        $product->actual_price = $request->actual_price;
        $product->discounted_price = $request->discount_price;

        if ($request->file('image') ) {
            $fileName = $product->name."-".time().'.'.$request->file('image')->getClientOriginalExtension();
            //dd($fileName);
            $product->main_image = $fileName;

            $request->file('image')->move(public_path('images'), $fileName);
        }

        if ($product->save()) {
            return redirect()->route('products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit')->with(compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->color = $request->color ? $request->color : '#ffffff';
        $product->actual_price = $request->actual_price;
        $product->discounted_price = $request->discount_price;

        if ($request->file('image') ) {
            $fileName = $product->name."-".time().'.'.$request->file('image')->getClientOriginalExtension();

            if ( $request->file('image')->storeAs('public/product', $fileName) ) {
                $product->main_image = $fileName;
            }
        }

        if ($product->save()) {
            return redirect()->route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productImage = str_replace('/storage/product', '', $product->main_image);;

        if ($productImage) {
            Storage::delete('/public/product/' . $productImage);
        }

        if ($product->delete()) {
            return redirect()->route('products.index');
        }
    }
}
