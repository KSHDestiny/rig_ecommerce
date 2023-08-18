<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function coupon()
    {
        return $this->belongsTo(CouponCode::class);
    }

    public function checkOrderStatus()
    {
        switch ($this->order_status) {
            case 0:
                echo 'btn-warning';
                break;

            case 1:
                echo 'btn-primary';
                break;

            case 2:
                echo 'btn-success';
                break;

            case 3:
                echo 'btn-danger';
                break;
        }
    }
}
