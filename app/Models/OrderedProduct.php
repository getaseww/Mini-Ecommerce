<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id','quantity','status'
    ];

    public function products()
    {
        return $this
            ->hasMany('App\Models\Product');
    }

    public function orders()
    {
        return $this
            ->hasMany('App\Models\Order');
    }
}
