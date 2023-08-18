<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $banners = Banner::when(request('search'), function($q){
        //     $q->where('name', 'like', '%'.request('search').'%');
        // })->latest()->paginate(5);

        $banners = Banner::latest()->paginate(5);

        return view('admin.banner.index', compact('banners'))
        ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = Banner::create($request->all());
        $this->storeBannerImage($banner);

        return redirect()->route('admin.banner.index')->with('success', 'New Banner Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.form', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->update($request->all());
        $this->storeBannerImage($banner);

        return redirect()->route('admin.banner.index')->with('success', 'Banner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json(['banners' => Banner::all()]);
    }

    public function storeBannerImage($product)
    {
        if (request()->hasFile('image')) {
            $file      = request()->file('image');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/banners');

            $file->move($save_path, $save_path."/$file_name");

            $product->update([
                'image' => $file_name,
            ]);
        }
    }
}
