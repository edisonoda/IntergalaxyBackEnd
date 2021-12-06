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
        return $this->belongsToMany(Order::class)
        ->withTimestamps()
        ->withPivot(['product_quantity']);
    }

    public function users(){
        return $this->belongsToMany(User::class)
        ->withTimestamps()
        ->withPivot(['product_quantity']);
    }
}
