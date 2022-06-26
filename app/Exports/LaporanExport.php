<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    public function headings(): array
    {
        return ["ID", "ID_Admin", "ID_Member","Kode_barang", "Jumlah", "Total Harga", "dibuat tanggal", "diupdate tanggal"];
    }
}
