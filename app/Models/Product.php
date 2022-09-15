<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['category_id', 'name', 'price', 'size', 'description',];

    public function category(){
        return $this->belongTo(Category::class);
    }
    public function productImages(){
        return $this->hasMany(ProductImages::class);
    }
}
