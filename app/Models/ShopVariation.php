<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopVariation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product()
    {

        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function shop()
    {

        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
