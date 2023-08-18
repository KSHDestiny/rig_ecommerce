<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::when(request('search'), function($q){
            $q->where('name', 'like', '%'.request('search').'%');
        })->latest()->paginate(5);

        return view('admin.product.index', compact('products'))
        ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
        $brands     = Brand::all();
        $categories = Category::all();

        return view('admin.product.form', compact('brands', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->except('image');
        $product = Product::create($validated);
        $this->storeProductImage($product);

        return redirect()->route('admin.product.index')->with('success', 'New Product Created Successfully');
    }

    public function edit(Product $product)
    {
        $brands     = Brand::all();
        $categories = Category::all();

        return view('admin.product.form', compact('brands', 'categories', 'product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->except('image');
        $product->update($validated);
        $this->storeProductImage($product);

        return redirect()->route('admin.product.index')->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['products' => Product::all()]);
    }

    public function updateProductStatus()
    {
        $data = request()->all();
        Product::where('id', $data['id'])->update([
            'status' => $data['status']
        ]);

        return response()->json(['message' => 'SUCCESS'], 200);
    }

    public function storeProductImage($product)
    {
        if (request()->hasFile('image')) {
            $file      = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/products');

            $file->move($save_path, $save_path."/$file_name");

            $product->update([
                'image' => $file_name,
            ]);
        }
    }
}
