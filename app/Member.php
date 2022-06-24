<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $table = 'member';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama','alamat'
    ];
}
