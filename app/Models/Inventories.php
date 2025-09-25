<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{

    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */

    protected $fillable = [
        'image',
        'item_code',
        'item_name',
        'pic',
        'location',
        'description',
        'price',
        'stock',
    ];
}
