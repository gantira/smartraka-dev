<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ExportController extends Controller
{
    public function daily($company_id = null, $periode = null)
    {
        DB::statement(DB::raw('SET @total = 0'));

        $dailys = Balance::verified()
            ->when(!auth()->user()->hasRole(['admin|super-admin']), function ($q) {
                return $q->myCompany();
            })
            ->select('*', DB::raw('@total := @total + (debit - credit) as saldo'))
            ->when($company_id, function ($q) use ($company_id) {
                return $q->whereHas('document.category', function ($q) use ($company_id) {
                    return $q->where('company_id', $company_id);
                });
            })
            ->when($periode, function ($q) use ($periode) {
                return $q->whereMonth('created_at', Carbon::parse($periode)->month)->whereYear('created_at', Carbon::parse($periode)->year);
            })
            ->get();

        $title = $periode ? 'Laporan Harian Periode ' . Carbon::parse($periode)->formatLocalized('%B %Y') : 'Laporan Harian';

        return PDF::loadView('exports.pdf.daily', [
            'dailys' => $dailys,
            'title' => $title
        ])->download('Laporan Harian.pdf');
    }

    public function journal($company_id = null, $periode = null)
    {
        $journals = Journal::verified()
            ->when(!auth()->user()->hasRole(['admin', 'super-admin']), function ($query) {
                return $query->myCompany();
            })
            ->when($company_id, function ($query) use($company_id) {
                return $query->whereHas('document.category', function ($query) use($company_id) {
                    return $query->where('company_id', $company_id);
                });
            })
            ->when($periode, function ($query) use ($periode){
                return $query->whereMonth('created_at', Carbon::parse($periode)->month)->whereYear('created_at', Carbon::parse($periode)->year);
            })
            ->get();

        $title = $periode ? 'Laporan Harian Periode ' . Carbon::parse($periode)->formatLocalized('%B %Y') : 'Laporan Harian';

        return PDF::loadView('exports.pdf.journal', [
            'journals' => $journals,
            'title' => $title
        ])->download('Laporan Jurnal.pdf');
    }

    public function ledger($company_id = null, $periode = null)
    {
        $journals = Journal::verified()
            ->when(!auth()->user()->hasRole(['admin', 'super-admin']), function ($query) {
                return $query->myCompany();
            })
            ->when($company_id, function ($query) use($company_id) {
                return $query->whereHas('document.category', function ($query) use($company_id) {
                    return $query->where('company_id', $company_id);
                });
            })
            ->when($periode, function ($query) use ($periode){
                return $query->whereMonth('created_at', Carbon::parse($periode)->month)->whereYear('created_at', Carbon::parse($periode)->year);
            })
            ->get();

        $title = $periode ? 'Laporan Harian Periode ' . Carbon::parse($periode)->formatLocalized('%B %Y') : 'Laporan Harian';

        return PDF::loadView('exports.pdf.journal', [
            'journals' => $journals,
            'title' => $title
        ])->download('Laporan Jurnal.pdf');
    }
}
