<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detil_transaksi extends Model
{
    protected $table = "transaction_details";
    protected $id= "id";
    protected $fillable = [
        'transaction_id','product_id', 'qty', 'discount', 'selling_price',
    ];
}
