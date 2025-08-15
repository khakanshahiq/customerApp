<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function vendor(){

        return $this->belongsTo(User::class,'vendor_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    // public function categories(){

    //     return $this->belongsToMany(Category::class);
    // }
// In Shop.php model
public function categories()
{
    return $this->belongsToMany(Category::class, 'category_shop');
}

}
