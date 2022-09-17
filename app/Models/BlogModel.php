<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $primaryKey = 'Id';

    protected $fillable = ['Id','Name','Thumbnail','Content','Is_delete','Is_active','View','Description'];
}
