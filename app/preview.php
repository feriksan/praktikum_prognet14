<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class preview extends Model
{
    use SoftDeletes;
    protected $table = "products";
	protected $primarykey ="id";
	protected $fillable = [
        'product_name','discount','price','description','product_rate','stock',
    ];
}
