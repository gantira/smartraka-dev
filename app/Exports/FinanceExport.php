<?php

namespace App\Exports;

use App\Models\DocumentDetail;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FinanceExport implements WithStyles, FromView
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
            10    => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        $finance = DocumentDetail::query()
            ->when($this->periode, function ($query) {
                return $query->whereMonth('created_at', Carbon::parse($this->periode)->month)->whereYear('created_at', Carbon::parse($this->periode)->year);
            })
            ->get()
            ->groupBy([
                'company_label',
                'account_status_label',
            ])
            ->transform(function ($item) {
                return $item->transform(function ($item) {
                    return $item->sum('price');
                });
            })->transform(function ($item) {
                return $item['Pendapatan'] ?: 0 - $item['Biaya'] ?: 0;
            });

        $title = $this->periode ? 'Laporan Keuangan Periode ' . Carbon::parse($this->periode)->formatLocalized('%B %Y') : 'Laporan Keuangan';

        return view('exports.excel.finance', [
            'finance' => $finance,
            'title' => $title
        ]);
    }
}
