@foreach ($ledgers as $key => $row)
    @if ($loop->first)
        <tr>
            <td align="center" colspan="6">{{ auth()->user()->company->name }}</td>
        </tr>
        <tr>
            <td align="center" colspan="6">{{ $title }}</td>
        </tr>
    @endif

    @foreach ($row as $key => $item)
        <table>
            <thead>
                <tr>
                    <td style="font-weight: bold">{{ $key }}</td>
                </tr>
                <tr>
                    <th style="font-weight: bold">Cabang</th>
                    <th style="font-weight: bold">Tanggal</th>
                    <th style="font-weight: bold">Uraian</th>
                    <th style="font-weight: bold" align="right">Debit</th>
                    <th style="font-weight: bold" align="right">Kredit</th>
                    <th style="font-weight: bold" align="right">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($item as $value)
                    <tr>
                        <td>{{ $value->company }}</td>
                        <td>{{ $value->tanggal }}</td>
                        <td>{{ $value->uraian }}</td>
                        <td align="right">{{ $value->debit }}</td>
                        <td align="right">{{ $value->credit }}</td>
                        <td align="right">{{ $value->saldo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" align="center">Tidak ada data</td>
                    </tr>
    @endforelse
    </tbody>
    </table>
@endforeach
@endforeach
