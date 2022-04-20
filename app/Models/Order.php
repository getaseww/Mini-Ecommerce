<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'address',
    ];
    
    public function products()
    {
        return $this
            ->belongsToMany('App\Models\Product','order_products');
    }
    
}
