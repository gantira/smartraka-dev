<?php

namespace App\Exports;

use App\Models\DocumentDetail;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RevenueExport implements WithStyles, FromView
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
        ];
    }

    public function view(): View
    {
        $revenues = DocumentDetail::verified()
            ->select('*', DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS yearMonth"))
            ->when(!auth()->user()->hasRole('admin|super-admin'), function ($q) {
                return $q->myCompany();
            })
            ->when($this->company_id, function ($q) {
                return $q->whereHas('document.category', function ($q) {
                    return $q->where('company_id', $this->company_id);
                });
            })
            ->when($this->periode, function ($q) {
                return $q->whereMonth('created_at', Carbon::parse($this->periode)->month)->whereYear('created_at', Carbon::parse($this->periode)->year);
            })
            ->get()->groupBy([
                'company_label',
                'account_status_label',
                'account_label',
                'product_label',
            ], true)->transform(function ($item) {
                return $item->transform(function ($item) {
                    return $item->transform(function ($item) {
                        return $item->transform(function ($item) {
                            return $item->sum('price');
                        });
                    });
                });
            });

        $title = $this->periode ? 'Laporan Laba Rugi Periode ' . Carbon::parse($this->periode)->formatLocalized('%B %Y') : 'Laporan Laba Rugi';

        return view('exports.excel.revenue', [
            'revenues' => $revenues,
            'title' => $title
        ]);
    }
}
