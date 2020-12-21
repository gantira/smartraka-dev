<p>{{ auth()->user()->company->name }}
    <br>Laporan Laba Rugi
    <br>{{ $title }}
</p>
<br>
<table style="border-style: groove">
    @forelse ($revenues as $company => $item)
        @hasrole('admin|superadmin')
        <tr>
            <td colspan="3" style="font-size: 17px; ">{{ $company }}</td>
        </tr>
        @endhasrole
        @foreach ($item as $label => $row)
            <tr style="font-weight: bold">
                <td colspan="3" class="lead text-uppercase bg-light lead"> {{ $label }}</td>
            </tr>
            @foreach ($row as $index => $account)
                <tr>
                    <td colspan="3" class="font-weight-lighter">{{ $index }}</td>
                </tr>
                @foreach ($account as $key => $val)
                    <tr class="text-muted">
                        <td class="w-50">- {{ $key }}</td>
                        <td class="w-25 text-right">{{ rupiah($val, 2) }}</td>
                        <td></td>
                    </tr>
                    @if ($loop->last)
                        <tr>
                            <td>Total {{ $index }}</td>
                            <td class="text-right">{{ rupiah($account->sum(), 2) }}</td>
                            <td></td>
                        </tr>
                    @endif
                @endforeach
                @if ($loop->last)
                    <tr style="font-weight: bold">
                        <td>Total {{ $label }}</td>
                        <td></td>
                        <td class="text-right">{{ rupiah($item[$label]->collapse()->sum(), 2) }}</td>
                    </tr>
                @endif
            @endforeach
            @if ($loop->last)
                <tr style="font-weight: bold">
                    <td>LABA RUGI USAHA</td>
                    <td></td>
                    <td class="text-right">
                        {{ rupiah($item['Pendapatan']->collapse()->sum() - $item['Biaya']->collapse()->sum(), 2) }}
                    </td>
                </tr>
            @endif
        @endforeach

    @empty
        Tidak ada data
    @endforelse
</table>
