<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Message;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function showHomePage()
    {
        $products = Product::where('status', 1)->latest()->take(8)->get();
        $brands = Brand::whereNotNull('image')->inRandomOrder()->get();
        $banners = Banner::inRandomOrder()->get();

        return view('frontend.home', compact('products', 'brands', 'banners'));
    }
    public function productShare($id){

        $product = Product::findOrFail($id);

        return view('frontend.share', compact('product'));
    }

    public function showProductListPage(Request $request)
    {
        $category = isset($request->category) ? Category::where('slug', $request->category)->first() : null;
        $brand = isset($request->brand) ? Brand::where('slug', $request->brand)->first(): null;
        $search = $request->search ?? null;

        $products = Product::where('status', 1)
            ->when(isset($request->category), function ($query) use ($request) {
                return $query->whereHas('category', function ($q) use ($request){
                    return $q->where('slug', $request->category);
                });
            })
            ->when(isset($request->brand), function ($query) use ($request) {
                return $query->whereHas('brand', function ($q) use ($request){
                    return $q->where('slug', $request->brand);
                });
            })
            ->when(isset($request->search), function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->latest()->get();

        $categories = Category::withCount('products')->get();
        $brands = Brand::get();

        return view('frontend.product-list', compact('categories', 'brands', 'products', 'category', 'search', 'brand'));
    }

    public function showContactUsPage()
    {
        return view('frontend.contact-us');
    }

    public function submitContactUsPage(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'subject'  => 'required',
            'email'    => 'required',
            'message'  => 'required',
        ]);

        Message::create($data);

        Toastr::success('Your Message Sent Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return back();
    }

    public function showBlogPage()
    {
        $blogs = Blog::latest()->paginate(4);

        return view('frontend.blog', compact('blogs'));
    }

    public function showBlogDetailsPage($blog_id)
    {
        $blog = Blog::findOrFail($blog_id);

        return view('frontend.blog-details', compact('blog'));
    }

    public function showOrderHistory($code = null)
    {
        // $user_id = \Auth::user()->id;
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        $order = $orders->when(!is_null($code), function ($query) use ($code) {
            return $query->where('order_code', $code);
        })->first();
        return view('frontend.order-history', compact('orders', 'order'));
    }

    public function showAboutPage()
    {
        return view('frontend.about');
    }
}
