<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRecuest;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $tags = Tag::get();
        return view('products.create', ['tags' => $tags]);
    }

    public function store(ProductRecuest $request)
    {
        $product = new Product();

        foreach ($request->name as $lang => $value) {
            $product->setTranslation('name', $lang, $value);
        }

        foreach ($request->description as $lang => $value) {
            $product->setTranslation('description', $lang, $value);
        }

        $product->status = $request->status;
        $product->image = $request->file('image')->store('images');
        $product->save();

        $product->tags()->attach($request->tag);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        $tags = Tag::get();
        return view('products.edit', ['product' => $product, 'tags' => $tags]);
    }

    public function update(ProductRecuest $request, Product $product)
    {

        foreach($request->name as $lang => $value) {
            $product->setTranslation ('name', $lang, $value);
        }
        foreach($request->description as $lang => $value) {
            $product->setTranslation ('description', $lang, $value);
        }
        $product->status= $request->status;

        $product->image = $request->file('image')->store('images');


        $product->update();

        $product->tags()->sync($request->tag);

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
