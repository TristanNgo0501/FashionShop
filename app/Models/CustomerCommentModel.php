<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCommentModel extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $primaryKey = 'customer_id';

    protected $fillable = ['customer_id','first_name','last_name'];
}
