<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class alamat extends Model
{
    use SoftDeletes;
    protected $table = "alamat_user";
	protected $primarykey ="id";
	protected $fillable = [
        'user_id','provinsi','kota','nama_jalan',
    ];
}
