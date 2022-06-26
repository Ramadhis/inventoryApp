<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbarang extends Model
{
    protected $table = 'logbarang';
    protected $fillable = [
        'id_user','subject','kode_barang','status','jumlah','ukuran','Tgl'
    ];
}
