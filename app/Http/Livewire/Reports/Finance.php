<?php

namespace App\Http\Livewire\Reports;

use App\Exports\FinanceExport;
use App\Models\Company;
use App\Models\DocumentDetail;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Finance extends Component
{
    use WithPagination;

    public $company_id;
    public $periode;
    public $perPage = 15;

    protected $listeners = ['excel', 'pdf'];
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['company_id' => ['except' => ''], 'periode' => ['except' => ''], 'perPage' => ['except' => 1]];

    public function render()
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

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.finance', [
            'finance' => $finance,
            'selectCompanies' => $selectCompanies
        ]);
    }

    public function excel()
    {
        return (new FinanceExport)->filter($this->company_id, $this->periode)->download('Laporan Keuangan.xlsx');
    }

    public function pdf()
    {
        return redirect()->route('pdf.finance.export', [
            'company_id' => $this->company_id,
            'periode' => $this->periode,
        ]);
    }
}
