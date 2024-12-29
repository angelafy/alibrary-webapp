<?php

namespace App\Exports;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\TernakHewan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BukuExport implements FromView, WithStyles, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('admin.buku.export.excel', [
            'buku' => Buku::all()
        ]);

        // return Excel::download(new HewanExport, 'hewan_' . Carbon::now()->format('Y-m-d_H-i-s') . '.xlsx');

    }

}
