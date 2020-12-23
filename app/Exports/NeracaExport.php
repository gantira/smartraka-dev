<?php

namespace App\Exports;

use App\Models\DocumentDetail;
use App\Models\Neraca;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NeracaExport implements WithStyles, FromView
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
        $neraca = Neraca::query()
            ->when($this->company_id, function ($q) {
                return $q->whereHas('company', function ($q) {
                    return $q->where('company_id', $this->company_id);
                });
            })
            ->when($this->periode, function ($query) {
                return $query->where('month', Carbon::parse($this->periode)->month)->where('year', Carbon::parse($this->periode)->year);
            })
            ->get()
            ->groupBy([
                'company_label',
                function ($item) {
                    return $item->neraca_account->status_label;
                },
                function ($item) {
                    return $item->neraca_account->name;
                },
                function ($item) {
                    return $item->name;
                },
            ])
            ->transform(function ($item) {
                return $item->transform(function ($item) {
                    return $item->transform(function ($item) {
                        return $item->transform(function ($item) {
                            return $item->sum('price');
                        });
                    });
                });
            });

        $title = $this->periode ? 'Laporan Neraca Periode ' . Carbon::parse($this->periode)->formatLocalized('%B %Y') : 'Laporan Neraca';

        return view('exports.excel.neraca', [
            'neraca' => $neraca,
            'title' => $title
        ]);
    }
}
