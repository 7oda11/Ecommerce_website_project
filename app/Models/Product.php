<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    function Category()
    {
        return $this->belongsTo(Category::class);
    }
    function Users()
    {
        return $this->belongsToMany(User::class, 'user_product');
    }
    function Order()
    {
        return $this->hasMany(Order::class);
    }
}
