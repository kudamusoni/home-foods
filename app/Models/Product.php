<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $casts = [
        'price' => 'integer',
        'sale_price' => 'integer',
        'cost_per_item' => 'integer',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    // When setting price, convert to cents/pennies
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (int) ($value * 100);
    }

    // When getting price, convert to dollars/pounds
    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    // If you need the raw penny value
    public function getRawPriceAttribute()
    {
        return $this->attributes['price'];
    }
}
