<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::when(request('search'), function($q){
            $q->where('name', 'like', '%'.request('search').'%');
        })->latest()->paginate(5);

        return view('admin.brand.index', compact('brands'))
        ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.brand.form');
    }

    public function store(BrandRequest $request)
    {
        $validated = $request->validated();
        $brand = Brand::create($validated);
        $this->storeBrandImage($brand);

        return redirect()->route('admin.brand.index')->with('success', 'New Brand Created Successfully');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.form', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $validated = $request->validated();
        $brand->update($validated);
        $this->storeBrandImage($brand);

        return redirect()->route('admin.brand.index')->with('success', 'Brand Updated Successfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json(['brands' => Brand::all()]);
    }

    public function storeBrandImage($product)
    {
        if (request()->hasFile('image')) {
            $file      = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/brands');

            $file->move($save_path, $save_path."/$file_name");

            $product->update([
                'image' => $file_name,
            ]);
        }
    }
}
