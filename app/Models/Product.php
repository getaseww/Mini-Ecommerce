<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'slug', 'description', 'quantity', 'price', 'image',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_categories');
    }

    public function user(){
        return $this
        ->belongsTo('App\Models\User');
    }

    public function orders()
    {
        return $this
            ->belongsToMany('App\Models\Order','order_products');
    }
}
