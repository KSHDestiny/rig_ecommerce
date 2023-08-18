<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCartList()
    {
        $coupon = session()->get('coupon') ?? null;
        $currentDate = date('Y-m-d');
        if(request('coupon')){
            $coupon = CouponCode::where('coupon_code', request('coupon'))->where('exp_date', '>', $currentDate)->first();
        }
        Session::put('coupon', $coupon);
        $cartList = session()->get('cart');

        return view('frontend.cart-list', compact('cartList', 'coupon'));
    }

    public function addToCart(Request $request)
    {
        $product_id = $request['product_id'];
        $product    = Product::find($product_id);
        $cart       = session()->get('cart');

        if (isset($cart[$product_id])) {
            return response()->json([
                'status' => 'warn',
                'cart'   => $cart
            ]);
        }

        $cart[$product_id]        = $product->toArray();
        // $cart[$product_id]['qty'] = $request['qty'] ? $request['qty'] : 1;
        $cart[$product_id]['qty'] = (int)$request['qty'] ? $request['qty'] : 1;
        session()->put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'cart'   => $cart
        ]);
    }

    public function updateCart(Request $request)
    {
        if (! is_null($request['product_ids'])) {
            foreach ($request['product_ids'] as $key => $product_id) {
                $cart = session()->get('cart');
                // dump($request['qty'][$key]);
                // dd($request->all());
                $cart[$product_id]['qty'] = $request['qty'][$key];
                session()->put('cart', $cart);
            }

            Toastr::success('Your Cart Updated Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        }

        return back();
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart');
        unset( $cart[$id] );
        session()->put('cart', $cart);

        Toastr::success('Your Item Removed from Cart Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return back();
    }

    public function clearCart()
    {
        session()->forget('cart');

        return back();
    }
}
