<?php 
namespace App\Helpers;


use Auth;
use Request;
use App\Logbarang;

class Helper
{
  public function Log($subject,$data){
    try {
      Logbarang::create([
        'id_user' => Auth::user()->id,
        'subject' => $subject,
        'kode_barang' => $data['kode_barang'],
        'status' => $data['status'],
        'jumlah' => $data['jumlah'],
      ]);
    } catch (Exception $err) {
      return false;
    }
    return true;
  }
}
?>