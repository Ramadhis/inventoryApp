<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Barang;
use App\Member;
use Auth;

class BarangkeluarController extends Controller
{
    public function index(){
        $All_order = Order::All();
        return view('barang_keluar/index',[
            'order' => $All_order
        ]);
    }
    public function add(){
        return view('barang_keluar/add');
    }
    public function insert(Request $req){
        $get_barang = Barang::where('kode',$req->kode_barang)->first();
        $get_member = Member::where('id',$req->id_member)->first();
        if($get_member == null){
            $msg = "Member Tidak terdaftar, silahkan cek terlebih dahulu";
            return redirect('order/add')->withInput()->with( 'msg' , $msg );
        }
        if($get_barang == null){
            $msg = "Kode Barang tidak ada, silahkan cek terlebih dahulu";
            return redirect('order/add')->withInput()->with( 'msg' , $msg );
        }
        // dd($get_barang['harga']);
        $total_harga = $req->jumlah * $get_barang->harga;
        $create = Order::create([
            'id_user' => Auth::user()->id,
            'id_member' => $req->id_member,
            'kode_barang'=> $req->kode_barang,
            'jumlah' => $req->jumlah,
            'total_harga' => $total_harga,
        ]);
        return redirect('order');
    }
    public function delete($id) {
        Order::find($id)->delete();
        return redirect('order');
    }

    public function edit($id){
        $order = Order::find($id);
        return view('barang_keluar/add', [
            'order' => $order
        ]);
    }

    public function update(Request $req){
        $get_barang = Barang::where('kode',$req->kode_barang)->first();
        $get_member = Member::where('id',$req->id_member)->first();
        if($get_member == null){
            $msg = "Member Tidak terdaftar, silahkan cek terlebih dahulu";
            return redirect('order/add')->withInput()->with( 'msg' , $msg );
        }
        if($get_barang == null){
            $msg = "Kode Barang tidak ada, silahkan cek terlebih dahulu";
            return redirect('order/add')->withInput()->with( 'msg' , $msg );
        }
        $total_harga = $req->jumlah * $get_barang->harga;
        Order::where('id',$req->id)->update([
            'id_user' => Auth::user()->id,
            'id_member' => $req->id_member,
            'kode_barang'=> $req->kode_barang,
            'jumlah' => $req->jumlah,
            'total_harga' => $total_harga,
        ]);
        return redirect('order');
    }
}
