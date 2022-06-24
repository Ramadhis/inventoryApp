<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Barang;
use App\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $member = Member::All();
        $barang = Barang::All();
        $order = Order::All();
        $total_pendapatan = 0;
        foreach ($order as $o){
            $total_pendapatan += (int)$o->total_harga;
        }
        return view('home',[
            'count_member' => count($member),
            'count_barang' => count($barang),
            'count_order' => count($order),
            'total_pendapatan' => $total_pendapatan,
        ]);
    }
}
