<?php

namespace App\Http\Livewire\Reports;

use App\Exports\LedgerExport;
use App\Models\Company;
use App\Models\Ledger as AppLedger;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Ledger extends Component
{
    use WithPagination;

    public $company_id;
    public $periode;
    public $perPage = 5;

    protected $listeners = ['excel', 'pdf'];
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['company_id' => ['except' => ''], 'periode' => ['except' => ''], 'perPage' => ['except' => 1]];

    public function render()
    {
        $ledgers = [];
        
        $ledgers = AppLedger::verified()
            ->when(!auth()->user()->hasRole(['admin|super-admin']), function ($q) {
                return $q->myCompany();
            })
            ->when($this->company_id, function ($q) {
                return $q->whereHas('document.category', function ($q) {
                    return $q->where('company_id', $this->company_id);
                });
            })
            ->get()->groupBy(function ($item) {
                return $item->company->name;
            })->transform(function ($item) {
                return $item->mapToGroups(function ($item) {
                    return [$item->account->name => $item];
                });
            });

        $ledgers = $ledgers->transform(function ($item) use ($ledgers) {
            return $item->transform(function ($item) use ($ledgers) {
                $saldo = 0;
                return $item->transform(function ($item, $index) use (&$saldo, $ledgers) {
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

                    if ($ledgers->count() == $index + 1) {
                        $saldo = 0;
                    }

                    return $item;
                })->when($this->periode, function ($query) {
                    return $query->where('yearMonth', $this->periode);
                })->sortDesc()->take($this->perPage)->sort();
            });
        });

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.ledger', [
            'ledgers' => $ledgers,
            'selectCompanies' => $selectCompanies
        ]);
    }

    public function excel()
    {
        return (new LedgerExport)->filter($this->company_id, $this->periode)->download('Laporan Buku Besar.xlsx');
    }

    public function pdf()
    {
        return redirect()->route('pdf.ledger.export', [
            'company_id' => $this->company_id,
            'periode' => $this->periode,
        ]);
    }
}
