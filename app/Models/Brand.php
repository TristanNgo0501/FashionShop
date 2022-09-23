<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=['brand_name', 'brand_image_path', 'product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
