<?php

namespace App\Exports;

use App\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanbarangmasukExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function collection()
    {
        return Barang::all();
    }
    public function headings(): array
    {
        return ["your", "headings", "here"];
    }
}
