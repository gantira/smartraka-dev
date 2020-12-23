<?php

namespace App\Http\Livewire\Reports;

use App\Exports\NeracaExport;
use App\Models\Company;
use App\Models\DocumentDetail;
use App\Models\Neraca as AppNeraca;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Neraca extends Component
{
    use WithPagination;

    public $company_id;
    public $month;
    public $year;
    public $periode;
    public $perPage = 5;

    protected $listeners = ['excel', 'pdf'];
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['company_id' => ['except' => ''], 'periode' => ['except' => ''], 'perPage' => ['except' => 1]];

    public function render()
    {
        $selectMonth = DocumentDetail::verified()->myCompany()->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        })->map(function ($item, $k) {
            return Carbon::now()->month($k)->formatLocalized('%B');
        })->all();

        $selectYear = DocumentDetail::verified()->myCompany()->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y');
        })->map(function ($item, $k) {
            return $k;
        })->all();


        $neraca = AppNeraca::query()
            ->when($this->company_id, function ($q) {
                return $q->whereHas('company', function ($q) {
                    return $q->where('company_id', $this->company_id);
                });
            })
            ->when(($this->month && $this->year), function ($q) {
                return $q->where('month', $this->month)->where('year', $this->year);
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

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.neraca', [
            'selectMonth' => $selectMonth,
            'selectYear' => $selectYear,
            'neraca' => $neraca,
            'selectCompanies' => $selectCompanies,
        ]);
    }

    public function excel()
    {
        return (new NeracaExport)->filter($this->company_id, $this->periode)->download('Laporan Neraca.xlsx');
    }

    public function pdf()
    {
        return redirect()->route('pdf.neraca.export', [
            'company_id' => $this->company_id,
            'periode' => $this->periode,
        ]);
    }
}
