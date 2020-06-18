<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use SoftDeletes;
    protected $table = "transactions";
    protected $id= "id";
    protected $fillable = [
        'timeout','address','regency', 'province', 'total', 'shipping_cost', 'sub_total', 'user_id', 'courier_id', 'proof_of_payment', 'status'
    ];
}
