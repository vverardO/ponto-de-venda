<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
    ];

    protected function priceFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format(($this->price / 100), 2, ',', '.'),
        );
    }
}
