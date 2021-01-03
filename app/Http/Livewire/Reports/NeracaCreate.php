<?php

namespace App\Http\Livewire\Reports;

use App\Models\Company;
use App\Models\DocumentDetail;
use App\Models\Neraca;
use App\Models\NeracaAccount;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class NeracaCreate extends Component
{
    use WithPagination;

    public $month;
    public $year;
    public $neraca_account_id;
    public $name;
    public $price;

    public function render()
    {
        $neracaOption = NeracaAccount::get()->groupBy('status_label')
            ->map(function ($item) {
                return $item->mapWithKeys(function ($item) {
                    return [$item->id => $item->name];
                });
            })->all();

        $monthOption = DocumentDetail::verified()->myCompany()->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        })->map(function ($item, $k) {
            return Carbon::now()->month($k)->formatLocalized('%B');
        })->all();

        $yearOption = DocumentDetail::verified()->myCompany()->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y');
        })->map(function ($item, $k) {
            return $k;
        })->all();

        $neracaPreview = []; 

        if ($this->month && $this->year) {
            $neracaPreview = Neraca::query()
                ->myCompany()
                ->when($this->month && $this->year, function ($query) {
                    return $query->where('month', $this->month)->where('year', $this->year);
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

                ])
                ->transform(function ($item) {
                    return $item->transform(function ($item) {
                        return $item->map(function ($item) {
                            return $item;
                        });
                    });
                });
        }

        $selectCompanies = Company::select('id', 'name')->get();

        return view('livewire.reports.neraca-create', [
            'selectCompanies' => $selectCompanies,
            'neracaPreview' => $neracaPreview,
            'neracaOption' => $neracaOption,
            'monthOption' => $monthOption,
            'yearOption' => $yearOption,
        ]);
    }

    public function showConfirmation($id)
    {
        $this->emit("swal:confirm", [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'destroy',
            'params'      => $id, // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }

    public function delete($id)
    {
        Neraca::find($id)->forceDelete();

        session()->flash('message', 'Data sudah dihapus.');
    }

    public function store()
    {
        $this->validate([
            'neraca_account_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        Neraca::create([
            'neraca_account_id' => $this->neraca_account_id,
            'company_id' => auth()->user()->company->id,
            'name' => $this->name,
            'price' => $this->price,
            'month' => $this->month,
            'year' => $this->year,
        ]);

        $this->reset(['name', 'price', 'neraca_account_id']);

        session()->flash('message', 'Data sudah ditambahkan.');
    }

}
