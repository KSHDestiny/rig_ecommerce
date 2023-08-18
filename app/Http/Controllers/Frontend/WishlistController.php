<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function showWishlistPage()
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', auth()->id())->get();

            return view('frontend.wishlist', compact('wishlist'));
        } else {
            Toastr::info("You Need to Login First &nbsp;<i class='fa fa-unlock-alt'></i>", 'INFO');
            return back();
        }
    }

    public function submitWishlistPage(Request $request)
    {
        if (Auth::check()) {

            $isAlreadyExists = Wishlist::where(['user_id' => auth()->id(), 'product_id' => $request['product_id']])->count();
            if ($isAlreadyExists == 0) {

                $wishlist = new Wishlist();
                $wishlist->product_id = $request['product_id'];
                $wishlist->user_id    = auth()->id();
                $wishlist->save();

                Toastr::success("Item Added to Your Wishlist Successfully &nbsp;<i class='far fa-check-circle'></i>", "SUCCESS");

            } else {

                Wishlist::where([
                    'user_id'     => auth()->id(),
                    'product_id' => $request['product_id']
                ])->delete();

                Toastr::success("Item Removed from Your Wishlist Successfully &nbsp;<i class='far fa-check-circle'></i>");

            }

            return back();

        } else {

            Toastr::info("You Need to Login First &nbsp;<i class='fa fa-unlock-alt'></i>", 'INFO');
            return back();

        }
    }

    public function removeWishlistItem($product_id)
    {
        Wishlist::where([
            'user_id'    => auth()->id(),
            'product_id' => $product_id
        ])->delete();

        Toastr::success("Item Removed from Your Wishlist Successfully &nbsp;<i class='far fa-check-circle'></i>");
        return back();
    }
}
