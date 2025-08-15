<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function shop(){
    return $this->belongsTo(Shop::class,'shop_id','id');

    }
public function product(){
return $this->belongsTo(Product::class,'product_id','id');

}

}
