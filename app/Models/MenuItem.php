<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    // List the allowed mass assignable attributes
    protected $fillable = [
        'name',
        'category',
        'price',
        'description',
        'availability',
    ];
}
