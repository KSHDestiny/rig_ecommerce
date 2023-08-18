<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function isWishlistProduct($user_id, $product_id)
    {
        $isWishlistProduct = Wishlist::where([
            'user_id'    => $user_id,
            'product_id' => $product_id
        ])->count();

        return $isWishlistProduct == 0 ? 'ri-heart-3-line' : 'ri-heart-3-fill';
    }
}
