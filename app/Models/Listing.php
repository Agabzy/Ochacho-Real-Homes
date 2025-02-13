<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'location',
        'land_size',
        'category',
        'images',
        'bedrooms',
        'bathrooms',
        'garage',
        'furnished',
        'heating',
        'cooling',
        'pool',
        'flooring_type',
        'lot_size',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(Admin::class); // A property belongs to an admin
    }
}

