<?php

namespace App\Exports;

use App\Models\Ledger;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LedgerExport implements WithStyles, FromView
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
        $ledger = Ledger::verified()
            ->when(!auth()->user()->hasRole(['admin|super-admin']), function ($q) {
                return $q->myCompany();
            })
            ->get()->groupBy(function ($item) {
                return $item->company->name;
            })->transform(function ($item) {
                return $item->mapToGroups(function ($item) {
                    return [$item->account->name => $item];
                });
            });

        $ledgers = $ledger->transform(function ($item) use ($ledger) {
            return $item->transform(function ($item) use ($ledger) {
                $saldo = 0;
                return $item->transform(function ($item, $index) use (&$saldo, $ledger) {
                    if ($item->account_id == 1) {
                        $saldo += ($item->debit - $item->credit);
                    } else {
                        $saldo += ($item->credit);
                    }

                    $item['saldo'] = rupiah($saldo, 2);
                    $item['debit'] = rupiah($item->debit, 2);
                    $item['credit'] = rupiah($item->credit, 2);
                    $item['company'] = $item->company->name;
                    $item['tanggal'] = tanggal($item->created_at);
                    $item['yearMonth'] = $item->created_at->format('Y-m');
                    $item['uraian'] = $item->parent_account->name;

                    if ($ledger->count() == $index + 1) {
                        $saldo = 0;
                    }

                    return $item;
                })->when($this->periode, function ($q) {
                    return $q->where('yearMonth', $this->periode);
                })->sortDesc();
            });
        });

        $title = $this->periode ? 'Laporan Buku Besar Periode ' . Carbon::parse($this->periode)->formatLocalized('%B %Y') : 'Laporan Buku Besar';

        return view('exports.excel.ledger', [
            'ledgers' => $ledgers,
            'title' => $title
        ]);
    }
}
