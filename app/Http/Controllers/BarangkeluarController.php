<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Barang;
use App\Member;
use App\Logbarang;
use App\Helpers\Helper;
use Auth;
use Input;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function delete($id) {
        $find_order = Order::find($id);
        $cek_barang = Barang::where('kode',$find_order->kode_barang)->first();
        if($cek_barang == null){
            $msg = "data barang tidak ditemukan";
            return back()->with(
                [
                    'msg' => $msg,
                ]
            );
        }

        //add to log        
        $log = new Helper;
        $data = [
            'kode_barang' => $find_order->kode_barang,
            'status' => 'Edit',
            'jumlah' =>  $find_order->jumlah,
        ];
        $log->Log('User menghapus data order, otomatis mengembalikan data stok',$data);
        //end add to log

        //kembalikan stok
        $update_stok = Barang::where('id',$cek_barang->id)->update([
            'jumlah' => ((int)$find_order->jumlah + (int)$cek_barang->jumlah),
        ]);

        $find_order->delete();

        $msg = "data berhasil dihapus, dan stok telah dikembalikan,silahkan cek stok.";
        return redirect('order')->with(
            [
                'success' => $msg,
            ]
        );
    }

    public function edit($id){
        $order = Order::find($id);
        return view('barang_keluar/add', [
            'order' => $order
        ]);
    }

    // public function validasiCek($kode,$jumlah){
    //     $cek = Barang::where('kode',$kode)->first();
    //     if($cek == null){
    //         $msg = "data barang Tidak ada, silahkan tambahkan data barang terlebih dahulu";
    //         return redirect('order/add')->withInput()->with( 'msg' , $msg );
    //     }
    //     if(((int)$jumlah >= (int)$cek->jumlah)){
    //         //permintaan teralu besar dari stok terdapat di database
    //         $msg = "Stok hanya tersisa ".$cek->jumlah.", tidak cukup untuk permintaan anda sebesar".$jumlah;
    //         return back()->with( 'msg' , $msg );
    //     }elseif((int)$jumlah == (int)$cek->jumlah){
    //         //stok request sama dengan stok di database
    //         $update_stok = Barang::where('id',$cek->id)->update([
    //             'jumlah' => '0',
    //         ]);
    //     }elseif(((int)$jumlah <= (int)$cek->jumlah)){
    //         //stok tersedia
    //         $pengurangan_stok = ($cek->jumlah - $jumlah);
    //         $update_stok = Barang::where('id',$cek->id)->update([
    //             'jumlah' => $pengurangan_stok,
    //         ]);
    //     }
    //     return $cek;
    // }

    public function insert(Request $req){
        $get_member = Member::where('id',$req->id_member)->first();
        $get_barang = Barang::where('kode',$req->kode_barang)->first();
        if($get_barang == null){
            $msg = "data barang Tidak ada, silahkan tambahkan data barang terlebih dahulu";
            return back()->with(
                [
                    'msg' => $msg,
                    'order' => $req->all(),
                ]
            );
        }
        if($get_member == null){
            $msg = "Member Tidak terdaftar, silahkan cek terlebih dahulu";
            return back()->with(
                [
                    'msg' => $msg,
                    'order' => $req->all(),
                ]
            );
        }
        $jumlah = $req->jumlah;
        //pengecekan stok
        if(((int)$jumlah > (int)$get_barang->jumlah)){
            //permintaan teralu besar dari stok terdapat di database
            $msg = "Stok tersisa ".$get_barang->jumlah.", tidak cukup untuk permintaan anda sebesar ".$jumlah;
            return back()->with(
                [
                    'msg' => $msg,
                    'order' => $req->all(),
                ]
            );
        }elseif((int)$jumlah == (int)$get_barang->jumlah){
            //stok request sama dengan stok di database
            $update_stok = Barang::where('id',$get_barang->id)->update([
                'jumlah' => '0',
            ]);
        }elseif(((int)$jumlah < (int)$get_barang->jumlah)){
            //stok tersedia
            $pengurangan_stok = ($get_barang->jumlah - $jumlah);
            $update_stok = Barang::where('id',$get_barang->id)->update([
                'jumlah' => $pengurangan_stok,
            ]);
        }

        $total_harga = $req->jumlah * $get_barang->harga;
        $create = Order::create([
            'id_user' => Auth::user()->id,
            'id_member' => $req->id_member,
            'kode_barang'=> $req->kode_barang,
            'jumlah' => $req->jumlah,
            'total_harga' => $total_harga,
        ]);

        //add to log        
        $log = new Helper;
        $data = [
            'kode_barang' => $req->kode_barang,
            'status' => 'create',
            'jumlah' =>  $req->jumlah,
        ];
        $log->Log('User Membuat data order baru',$data);
        //end add to log

        return redirect('order');
    }

    public function update(Request $req){
        $get_member = Member::where('id',$req->id_member)->first();
        $get_barang = Barang::where('kode',$req->kode_barang)->first();
        if($get_barang == null){
            $msg = "data barang Tidak ada, silahkan tambahkan data barang terlebih dahulu";
            return back()->with(
                [
                    'msg' => $msg,
                ]
            );
        }
        if($get_member == null){
            $msg = "Member Tidak terdaftar, silahkan cek terlebih dahulu";
            return back()->with(
                [
                    'msg' => $msg,
                ]
            );
        }
        $jumlah = $req->jumlah;
        //pengecekan stok
        if(((int)$jumlah > (int)$get_barang->jumlah)){
            //permintaan teralu besar dari stok terdapat di database
            $msg = "Stok tersisa ".$get_barang->jumlah.", tidak cukup untuk permintaan anda sebesar ".$jumlah;
            return back()->with(
                [
                    'msg' => $msg,
                ]
            );
        }elseif(((int)$jumlah <= (int)$get_barang->jumlah)){
            //stok tersedia

            //kembalikan stok terlebih dahulu
            $find_order = Order::find($req->id);
            $back_to_stock = Barang::where('id',$get_barang->id)->update([
                'jumlah' => ((int)$find_order->jumlah + (int)$get_barang->jumlah),
            ]);
            
            //ambil update terbaru dari table barang
            $get_updated_barang = Barang::find($get_barang->id);

            //pengurangan stok
            $pengurangan_stok = ($get_updated_barang->jumlah - $jumlah);
            
            //update
            $update_stok = Barang::where('id',$get_barang->id)->update([
                'jumlah' => $pengurangan_stok,
            ]);
        }

        //validasi cek stok

        $total_harga = $req->jumlah * $get_barang->harga;
        Order::where('id',$req->id)->update([
            'id_user' => Auth::user()->id,
            'id_member' => $req->id_member,
            'kode_barang'=> $req->kode_barang,
            'jumlah' => $req->jumlah,
            'total_harga' => $total_harga,
        ]);
        
        //add to log        
        $log = new Helper;
        $data = [
            'kode_barang' => $req->kode_barang,
            'status' => 'Edit',
            'jumlah' =>  $req->jumlah,
        ];
        $log->Log('User Mengubah data order',$data);
        //end add to log

        return redirect('order');
    }

    public function export_excel()
	{
		return Excel::download(new LaporanExport, 'laporan_barang_keluar.xlsx');
	}
}
