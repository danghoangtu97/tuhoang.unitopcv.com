<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $guarded = [];

    function product_orders() 
    {
        return $this->hasMany(product_order::class, 'order_id'); 
    }

    function customer()
    {
        return $this->belongsTo(customer::class);
    }
}
