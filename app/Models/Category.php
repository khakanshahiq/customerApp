<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    // public function shops(){
    //     return $this->hasMany(Shop::class);



    // }
// In Category.php model
public function shops()
{
    return $this->belongsToMany(Shop::class, 'category_shop');
}

}
