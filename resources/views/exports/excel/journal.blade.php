<table>
    <thead>
        <tr>
            <td align="center" colspan="5">{{ auth()->user()->company->name }}</td>
        </tr>
        <tr>
            <td align="center" colspan="5">{{ $title }}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th>Cabang</th>
            <th>Tanggal</th>
            <th align="center">Uraian</th>
            <th align="right">Debit</th>
            <th align="right">Kredit</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($journals as $key => $row)
            <tr>
                <td>{{ $key % 2 == 0 ? $row->company->name : '' }}</td>
                <td>{{ $key % 2 == 0 ? tanggal($row->created_at) : '' }}</td>
                <td align="{{ $key % 2 == 0 ?: 'right' }}">{{ $row->description }}
                </td>
                <td align="right">{{ rupiah($row->debit, 2) }}</td>
                <td align="right">{{ rupiah($row->credit, 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" align="center">Tidak ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>
