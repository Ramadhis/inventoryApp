<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangmasukController extends Controller
{
    public function index(){
        $All_barang = Barang::All();
        return view('barang_masuk/index', [
            'barang' => $All_barang
        ]);
    }
    
    public function add(){
        return view('barang_masuk/add');
    }

    public function insert(Request $req){
        $create = Barang::create([
            'nama' => $req->nama,
            'harga' => $req->harga,
            'jenis' => $req->jenis,
            'kode' => $req->kode,
            'warna' => $req->warna,
            'ukuran' => $req->ukuran,
            'jumlah' => $req->jumlah,
            'tgl_masuk'=> $req->tgl_masuk
        ]);
        return redirect('barang');
    }

    public function delete($id) {
        Barang::find($id)->delete();
        return redirect('barang');
    }
    public function edit($id){
        $barang = Barang::find($id);
        return view('barang_masuk/add', [
            'barang' => $barang
        ]);
    }

    public function update(Request $req){
        Barang::where('id',$req->id)->update([
            'nama' => $req->nama,
            'harga' => $req->harga,
            'jenis' => $req->jenis,
            'kode' => $req->kode,
            'warna' => $req->warna,
            'ukuran' => $req->ukuran,
            'jumlah' => $req->jumlah,
            'tgl_masuk'=> $req->tgl_masuk
        ]);
        return redirect('barang');
    }

}
