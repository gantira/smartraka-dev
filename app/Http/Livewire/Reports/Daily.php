<?php

namespace App\Http\Livewire\Reports;

use App\Exports\DailyExport;
use App\Models\Balance;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Daily extends Component
{
    use WithPagination;

    public $company_id;
    public $periode;
    public $perPage = 15;

    protected $listeners = ['excel', 'pdf'];
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['company_id' => ['except' => ''], 'periode' => ['except' => '']];

    public function render()
    {
        DB::statement(DB::raw('SET @total = 0'));

        $dailys = Balance::verified()
            ->when(!auth()->user()->hasRole(['admin|super-admin']), function ($query) {
                return $query->myCompany();
            })
            ->select('*', DB::raw('@total := @total + (debit - credit) as saldo'))
            ->when($this->company_id, function ($query) {
                return $query->whereHas('document.category', function ($query) {
                    return $query->where('company_id', $this->company_id);
                });
            })
            ->when($this->periode, function ($query) {
                return $query->whereMonth('created_at', Carbon::parse($this->periode)->month)->whereYear('created_at', Carbon::parse($this->periode)->year);
            })
            ->paginate($this->perPage);

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.daily', [
            'dailys' => $dailys,
            'selectCompanies' => $selectCompanies
        ]);
    }

    public function excel()
    {
        return (new DailyExport)->filter($this->company_id, $this->periode)->download('Laporan Harian.xlsx');
    }

    public function pdf()
    {
        return redirect()->route('pdf.daily.export', [
            'company_id' => $this->company_id,
            'periode' => $this->periode,
        ]);
    }
}
