<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use App\Traits\GenerateOrderCode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showCheckoutPage()
    {
        $coupon = session()->get('coupon');
        $cartList = session()->get('cart');

        if (is_null($cartList)) {
            Toastr::warning('Your Cart is Empty &nbsp;<i class="fas fa-exclamation-circle"></i>', 'EMPTY CART');
            return back();
        }

        return view('frontend.checkout', compact('cartList', 'coupon'));
    }

    public function submitCheckoutPage(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required',
            'total_amt' => 'required',
            'coupon_code' => 'nullable',
        ]);
        DB::beginTransaction();
        try{
            // Update User Info
            // $user = User::find(\Auth::user()->id);
            $user = User::find(Auth::user()->id);
            $user->name    = $data['name'];
            $user->email   = $data['email'];
            $user->phone   = $data['phone'];
            $user->address = $data['address'];
            $user->save();

            // Store Order
            $order = new Order();
            $order->order_code = GenerateOrderCode::generateRandomCode();
            $order->user_id    = auth()->user()->id;
            $order->total_amt  = $data['total_amt'];
            $coupon = CouponCode::where('coupon_code','LIKE',"%{$data['coupon_code']}%")->first();
            $order->coupon_id = $coupon->id;
            $order->save();

            // Store Order Items
            $cart = session()->get('cart');
            foreach($cart as $item){
                $product = Product::where('id', $item['id'])->select('id', 'price')->first();
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'price'      => $product->price,
                    'qty'        => $item['qty']
                ]);
            }

            DB::commit();
            session()->forget('cart');

            Toastr::success('Your Order Submitted Successfully &nbsp;<i class="far fa-check-circle"></i>', 'THANK YOU');
            return redirect()->route('frontend.home');

        }catch(\Exception $e){
            DB::rollback();

            // dd($e->getMessage());
            Toastr::error('Something Went Wrong! Try Again', 'Error');
            return redirect()->back();
        }


    }
}
