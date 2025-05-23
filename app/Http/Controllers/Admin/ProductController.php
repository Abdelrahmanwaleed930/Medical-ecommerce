<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->only(['name', 'description', 'price', 'category_id']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_images', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->only(['name', 'description', 'price', 'category_id']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_images', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated!');
    }
            public function logs(Product $product)
        {
            $logs = $product->logs()->latest()->get();
            return view('admin.products.logs', compact('product', 'logs'));
        }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted!');
    }
}