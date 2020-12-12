<?php

namespace App\Exports;

use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DailyExport implements WithStyles, FromView
{
    use Exportable;

    public function filter($company_id, $periode)
    {
        $this->company_id = $company_id;
        $this->periode = $periode;

        return $this;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
            4    => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        DB::statement(DB::raw('SET @total = 0'));

        $dailys = Balance::verified()
            ->when(!auth()->user()->hasRole(['admin|super-admin']), function ($q) {
                return $q->myCompany();
            })
            ->select('*', DB::raw('@total := @total + (debit - credit) as saldo'))
            ->when($this->company_id, function ($q) {
                return $q->whereHas('document.category', function ($q) {
                    return $q->where('company_id', $this->company_id);
                });
            })
            ->when($this->periode, function ($q) {
                return $q->whereMonth('created_at', Carbon::parse($this->periode)->month)->whereYear('created_at', Carbon::parse($this->periode)->year);
            })
            ->get();

        $title = $this->periode ? 'Laporan Harian Periode ' . Carbon::parse($this->periode)->formatLocalized('%B %Y') : 'Laporan Harian';

        return view('exports.excel.daily', [
            'dailys' => $dailys,
            'title' => $title
        ]);
    }
}