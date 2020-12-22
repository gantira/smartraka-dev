<?php

namespace App\Http\Livewire\Reports;

use App\Exports\RevenueExport;
use App\Models\Company;
use App\Models\DocumentDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Revenue extends Component
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

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.revenue', [
            'revenues' => $revenues,
            'selectCompanies' => $selectCompanies,
        ]);
    }

    public function excel()
    {
        return (new RevenueExport)->filter($this->company_id, $this->periode)->download('Laporan Laba Rugi.xlsx');
    }

    public function pdf()
    {
        return redirect()->route('pdf.revenue.export', [
            'company_id' => $this->company_id,
            'periode' => $this->periode,
        ]);
    }
}
