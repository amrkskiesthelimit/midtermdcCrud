<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        return Inertia::render('Products/index', [
            'products' => $products,
            'csrf' => csrf_token(),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('Products.index')->with('message', 'Product deleted successfully.');
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand'         => 'required|string',
            'name'          => 'required|string',
            'description'   => 'required|string',
            'thumbnail'     => 'image|required',
            'retail_price'  => 'required|numeric',
            'qty_stock'     => 'required|integer',
            'category_id'   => 'required|exists:categories,id', // Make sure the category exists in the 'categories' table.
        ]);

        $product = new Product;

        $product->brand         = $request->input('brand');
        $product->name          = $request->input('name');
        $product->description   = $request->input('description');
        $product->retail_price  = $request->input('retail_price');
        $product->qty_stock     = $request->input('qty_stock');
        $product->category_id   = $request->input('category_id');

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $product->thumbnail = $path;
        }
        $product->save();

        return redirect()->route('product.index');
    }
}
