<?php

namespace App\Http\Livewire\Reports;

use App\Exports\JournalExport;
use App\Models\Company;
use App\Models\Journal as AppJournal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Journal extends Component
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
        $journals = AppJournal::verified()
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
            ->paginate($this->perPage);

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.journal', [
            'journals' => $journals,
            'selectCompanies' => $selectCompanies
        ]);
    }

    public function excel()
    {
        return (new JournalExport)->filter($this->company_id, $this->periode)->download('Laporan Jurnal.xlsx');
    }

    public function pdf()
    {
        return redirect()->route('pdf.journal.export', [
            'company_id' => $this->company_id,
            'periode' => $this->periode,
        ]);
    }
}
