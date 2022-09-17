<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentModel extends Model
{
    use HasFactory;
    protected $table = 'comment_blog';

    protected $primaryKey = 'Id';

    protected $fillable = ['Id','Id_Blog','Content','Is_delete'];
}
