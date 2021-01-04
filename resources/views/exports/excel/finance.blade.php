<table>
    @forelse ($finance as $company => $item)
        @if ($loop->first)
            <tr>
                <td align="center" colspan="3">{{ auth()->user()->company->name }}</td>
            </tr>
            <tr>
                <td align="center" colspan="3">{{ $title }}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
        @endif

        <tr class="h6">
            <td>{{ $company }}</td>
            <td align="right">{{ rupiah($item, 2) }}</td>
            <td></td>
        </tr>
        @if ($loop->last)
            <tr class="lead bg-light">
                <td>SISA LABA USAHA</td>
                <td></td>
                <td align="right">{{ rupiah($finance->sum(), 2) }}</td>
            </tr>
        @endif
    @empty
        Tidak ada data
    @endforelse
</table>
