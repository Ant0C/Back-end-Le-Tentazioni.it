<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        //$this->authorize('index', $product);
        $trashed = $request->input('trashed');

        if ($trashed) {
            $products = Product::onlyTrashed()->get(); 
        } else {
            $products = Product::all();
        }

        $num_of_trashed = Product::onlyTrashed()->count();

        return view('products.index', compact('products', 'num_of_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, Product $product)
    {
        //$this->authorize('store', $product);
        $data = $request->validated();
        $data['visible'] = 1;
        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('thumbnail')) {
            $cover_path = Storage::put('uploads', $data['thumbnail']);
            $data['cover_image'] = $cover_path;
        }

        if ($request->hasFile('thumbnail_s')) {
            $cover_path_s = Storage::put('uploads', $data['thumbnail_s']);
            $data['cover_image_s'] = $cover_path_s;
        }

        $product = Product::create($data);

        if(isset($data['categories'])){
            $product->categories()->attach($data['categories']);
        }


        return to_route('products.show',$product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //$this->authorize('view', $product);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //$this->authorize('update', $product);

        $data = $request->validated();

        if( $data['name'] !== $product->name){
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('thumbnail')) {
            $cover_path = Storage::put('uploads', $data['thumbnail']);
            $data['cover_image'] = $cover_path;

            if ($product->cover_image && Storage::exists($product->cover_image)) {
                Storage::delete($product->cover_image);
            }
        }

        if ($request->hasFile('thumbnail_s')) {
            $cover_path_s = Storage::put('uploads', $data['thumbnail_s']);
            $data['cover_image_s'] = $cover_path_s;

            if ($product->cover_image_s && Storage::exists($product->cover_image_s)) {
                Storage::delete($product->cover_image_s);
            }
        }

        if(isset($data['categories'])){
            $product->categories()->sync($data['categories']);
            } else {
                $product->categories()->detach();
            }

        $product->update($data);

        return to_route('products.show', $product);
    }

    public function restore(Request $request, Product $product)
    {

        if ($product->trashed()) {
            $product->restore();

            $request->session()->flash('message', 'Il prodotto è stato ripristinato.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$this->authorize('delete', $product);
        if($product->trashed()){
            $product->categories()->detach();
            $product->forceDelete();
        }else{
            $product->delete();
        }

        return back();
    }
}
