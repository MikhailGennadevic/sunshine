<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category',
        'in_stock'
    ];

    public function scopeCategory($query, $category)
    {
        return $query->when($category, fn($q) => $q->where('category', $category));
    }

    public function scopeInStock($query, $inStock)
    {
        return $query->when($inStock !== null, 
            fn($q) => $q->where('in_stock', filter_var($inStock, FILTER_VALIDATE_BOOLEAN))
        );
    }

    public static function totalInStockValue()
    {
        return self::where('in_stock', true)->sum('price');
    }

}
