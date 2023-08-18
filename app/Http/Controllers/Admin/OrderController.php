<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::when(request('search'), function($q){
        //     $q->orWhere('code', 'like', '%'.request('search').'%');
        // })->latest()->paginate(5);

        $orders = Order::latest()->paginate();
        $orderStatus = config('helper.order_status');
        return view('admin.order.index', compact('orders','orderStatus'))
        ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function show(Order $order)
    {
        $orderStatus = config('helper.order_status');
        return view('admin.order.show', compact('order','orderStatus'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function updateOrderStatus(Request $request)
    {
        Order::where('id', $request['order_id'])->update([
            'order_status' => $request['status']
        ]);

        return response()->json(['message' => 'SUCCESS'], 200);
    }
}
