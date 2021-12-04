<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
