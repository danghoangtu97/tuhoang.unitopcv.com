<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [];

    function categoriesChildren()
    {
        return $this->hasMany(category::class, 'parent_id');
    }
}
