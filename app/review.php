<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class review extends Model
{
    use SoftDeletes;
    protected $table= "product_reviews";
    protected $primarykey = "id";
    protected $fillable = [
        'product_id','user_id', 'rate', 'content',
    ];
}
