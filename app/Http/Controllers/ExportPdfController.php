<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\DocumentDetail;
use App\Models\Journal;
use App\Models\Ledger;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class ExportPdfController extends Controller
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
            ->when($company_id, function ($query) use ($company_id) {
                return $query->whereHas('document.category', function ($query) use ($company_id) {
                    return $query->where('company_id', $company_id);
                });
            })
            ->when($periode, function ($query) use ($periode) {
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
        $ledger = Ledger::verified()
            ->when(!auth()->user()->hasRole(['admin|super-admin']), function ($q) {
                return $q->myCompany();
            })
            ->when($company_id, function ($q) use ($company_id) {
                return $q->whereHas('document.category', function ($q) use ($company_id) {
                    return $q->where('company_id', $company_id);
                });
            })
            ->get()->groupBy(function ($item) {
                return $item->company->name;
            })->transform(function ($item) {
                return $item->mapToGroups(function ($item) {
                    return [$item->account->name => $item];
                });
            });

        $ledgers = $ledger->transform(function ($item) use ($ledger, $company_id, $periode) {
            return $item->transform(function ($item) use ($ledger, $company_id, $periode) {
                $saldo = 0;
                return $item->transform(function ($item, $index) use (&$saldo, $ledger, $company_id, $periode) {
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
                })->when($periode, function ($q) use ($periode) {
                    return $q->where('yearMonth', $periode);
                })->sortDesc();
            });
        });

        $title = $periode ? 'Laporan Buku Besar Periode ' . Carbon::parse($periode)->formatLocalized('%B %Y') : 'Laporan Buku Besar';

        return PDF::loadView('exports.pdf.ledger', [
            'ledgers' => $ledgers,
            'title' => $title
        ])->download('Laporan Buku Besar.pdf');
    }

    public function revenue($company_id = null, $periode = null)
    {
        $revenues = DocumentDetail::verified()
            ->select('*', DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS yearMonth"))
            ->when(!auth()->user()->hasRole('admin|super-admin'), function ($q) {
                return $q->myCompany();
            })
            ->when($company_id, function ($q) use ($company_id) {
                return $q->whereHas('document.category', function ($q) use ($company_id) {
                    return $q->where('company_id', $company_id);
                });
            })
            ->when($periode, function ($q) use ($periode) {
                return $q->whereMonth('created_at', Carbon::parse($periode)->month)->whereYear('created_at', Carbon::parse($periode)->year);
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

        $title = $periode ? 'Laporan Laba Rugi Periode ' . Carbon::parse($periode)->formatLocalized('%B %Y') : 'Laporan Laba Rugi';

        return PDF::loadView('exports.pdf.revenue', [
            'revenues' => $revenues,
            'title' => $title
        ])->download('Laporan Laba Rugi.pdf');
    }
}
