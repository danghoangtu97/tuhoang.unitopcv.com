<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    
    function images()
    {
        return $this->hasMany(product_image::class, 'product_id');
    }
}
