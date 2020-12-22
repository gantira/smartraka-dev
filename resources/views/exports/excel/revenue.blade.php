<table>
    @forelse ($revenues as $company => $item)
        @if ($loop->first)
            <tr>
                <td align="center" colspan="3">{{ auth()->user()->company->name }}</td>
            </tr>
            <tr>
                <td align="center" colspan="3">{{ $title }}</td>
            </tr>
        @endif

        <tr>
            <td></td>
        </tr>

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
                    <tr>
                        <td>- {{ $key }}</td>
                        <td align="right">{{ rupiah($val, 2) }}</td>
                        <td></td>
                    </tr>
                    @if ($loop->last)
                        <tr>
                            <td>Total {{ $index }}</td>
                            <td align="right">{{ rupiah($account->sum(), 2) }}</td>
                            <td></td>
                        </tr>
                    @endif
                @endforeach
                @if ($loop->last)
                    <tr style="font-weight: bold">
                        <td>Total {{ $label }}</td>
                        <td></td>
                        <td align="right">{{ rupiah($item[$label]->collapse()->sum(), 2) }}</td>
                    </tr>
                @endif
            @endforeach
            @if ($loop->last)
                <tr style="font-weight: bold">
                    <td>LABA RUGI USAHA</td>
                    <td></td>
                    <td align="right">
                        {{ rupiah($item['Pendapatan']->collapse()->sum() - $item['Biaya']->collapse()->sum(), 2) }}
                    </td>
                </tr>
            @endif
        @endforeach

    @empty
        Tidak ada data
    @endforelse
</table>
