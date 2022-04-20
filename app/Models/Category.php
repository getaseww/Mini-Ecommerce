<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description', 'user_id', 'display',
    ];


    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_categories');
    }

    public function user()
    {
        return $this
            ->belongsTo('App\Models\User');
    }
}
