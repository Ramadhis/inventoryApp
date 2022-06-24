<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'order';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_user','id_member','kode_barang', 'jumlah', 'total_harga',
    ];
}
