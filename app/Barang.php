<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;
    protected $table = 'barang';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama','harga','jenis','kode','warna','ukuran','jumlah','tgl_masuk'
    ];
}
