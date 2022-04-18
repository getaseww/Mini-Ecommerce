<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'slug', 'description', 'quantity', 'price', 'status', 'image',
    ];

    public function categories()
    {
        return $this
            ->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function user(){
        return $this
        ->belongsTo('App\Models\User');
    }
}
