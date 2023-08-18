<?php

namespace App\Http\Controllers\Admin;

use App\Models\CouponCode;
use Illuminate\Http\Request;
use App\Http\Requests\CouponCodeRequest;
use App\Http\Controllers\Controller;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = CouponCode::when(request('search'), function($q){
            $q->where('coupon_code', 'like', '%'.request('search').'%')
                ->orWhere('discount', 'like', '%'.request('search').'%');
        })->latest()->paginate(5);

        return view('admin.coupon.index', compact('coupons'))
        ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponCodeRequest $request)
    {
        $validated = $request->validated();
        CouponCode::create($validated);

        return redirect()->route('admin.coupon.index')->with('success', 'New Coupon Code Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CouponCode $couponCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CouponCode $coupon)
    {
        return view('admin.coupon.form', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponCodeRequest $request, CouponCode $coupon)
    {
        $validated = $request->validated();
        $coupon->update($validated);

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CouponCode $coupon)
    {
        $coupon->delete();

        return response()->json(['coupons' => CouponCode::all()]);
    }
}
