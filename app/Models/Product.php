<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'price',
        'description',
    ];

    public function orders(){
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
