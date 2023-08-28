<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    function User()
    {
        return $this->belongsTo(User::class);
    }
    function Product()
    {
        return $this->hasMany(Product::class);
    }
}
