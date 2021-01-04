<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\DocumentDetail;
use App\Models\Ledger;
use App\Models\Sof;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $revenue = DocumentDetail::verified()->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year);
        $revenue = $revenue->get()->groupBy('account_status_label')->transform(function ($item, $k) {
            return $item->groupBy('account_label')->transform(function ($item, $k) {
                return $item->groupBy('product_label');
            });
        });

        $total = (!empty($revenue['Pendapatan']) ? $revenue['Pendapatan']->flatten(2)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        }) : 0) - (!empty($revenue['Biaya']) ? $revenue['Biaya']->flatten(2)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        }) : 0);

        $user = User::whereCompanyId(auth()->user()->company->id)->count();

        $document = DocumentDetail::whereHas('document', function ($q) {
            return $q->whereHas('category', function ($q) {
                return $q->whereCompanyId(auth()->user()->company->id);
            });
        })->count();

        $balance = Ledger::verified()->where('account_id', 1)->get()->sum(function ($q) {
            return $q['debit'] - $q['credit'];
        });

        $sof = Sof::verified()->sum('price');

        $product = DocumentDetail::whereHas('document', function ($q) {
            return $q->whereHas('category', function ($q) {
                return $q->whereCompanyId(auth()->user()->company->id);
            });
        })->get()->groupBy('product.name')->transform(function ($item, $k) {
            return $item->sum('qty') . ' ' . $item->first()->product->unit->name;
        });

        return view('livewire.dashboards.index', [
            'total' => $total,
            'user' => $user,
            'document' => $document,
            'balance' => $balance,
            'sof' => $sof,
            'product' => $product
        ]);
    }
}
