<?php

namespace App\Exports;

use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JournalExport implements WithStyles, FromView
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
        $journals = Journal::verified()
            ->when(!auth()->user()->hasRole(['admin', 'super-admin']), function ($query) {
                return $query->myCompany();
            })
            ->when($this->company_id, function ($query) {
                return $query->whereHas('document.category', function ($query) {
                    return $query->where('company_id', $this->company_id);
                });
            })
            ->when($this->periode, function ($query) {
                return $query->whereMonth('created_at', Carbon::parse($this->periode)->month)->whereYear('created_at', Carbon::parse($this->periode)->year);
            })
            ->get();

        $title = $this->periode ? 'Laporan Jurnal Periode ' . Carbon::parse($this->periode)->formatLocalized('%B %Y') : 'Laporan Jurnal';

        return view('exports.excel.journal', [
            'journals' => $journals,
            'title' => $title
        ]);
    }
}