<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $hidden = ['id', 'created_at', 'updated_at'];
    protected $attributes = [
        'price.currency' => 'EUR',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        $array['price'] = $this->calculatedPrice;
        return $array;
    }

    public function getCalculatedPriceAttribute()
    {
        $discount = 0;

        if ($this->category === 'insurance') {
            $discount = 0.3;
        }

        if ($this->sku === 000001) {
            $discount = 0.15;
        }

        $finalPrice = $discount > 0 ?
            intval($this->price / 100 * (1 - $discount)) * 100 :
            $this->price;

        $price = [
            'original' => $this->price,
            'final' => $finalPrice,
            'discount_percentage' => $discount > 0 ? strval($discount * 100) . '%' : null,
            'currency' => 'EUR'
        ];

        return $price;
    }

    public function scopeByPrice($query, $price, $operator)
    {
        return $query->where('price', $operator, $price);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', '=', $category);
    }
}
