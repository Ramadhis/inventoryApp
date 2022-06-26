<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logbarang;

class LogbarangController extends Controller
{
    public function index(){
        $all_log = Logbarang::orderBy('id','DESC')->get();
        return view('logbarang/index',['log' => $all_log]);
    }
}
