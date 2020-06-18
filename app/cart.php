<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cart extends Model
{
    use SoftDeletes;
    protected $table = "carts";
    protected $id= "id";
    protected $fillable = [
        'user_id','product_id','qty'
    ];
}
