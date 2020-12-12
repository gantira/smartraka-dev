<table>
    <thead>
        <tr><td colspan="7">{{ auth()->user()->company->name }}</td></tr>
        <tr><td colspan="7">{{ $title }}</td></tr>
        <tr><td></td></tr>
        <tr>
            <th>Cabang</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th align="center">Kuantitas</th>
            <th align="right">Debit</th>
            <th align="right">Kredit</th>
            <th align="right">Saldo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dailys as $item)
            <tr>
                <td>{{ $item->document->category->company->name }}</td>
                <td>{{ tanggal($item->created_at) }}</td>
                <td>{{ $item->document->category->name }}</td>
                <td align="center">{{ $item->document->totalqty }}</td>
                <td align="right">{{ rupiah($item->debit, 2) }}</td>
                <td align="right">{{ rupiah($item->credit, 2) }}</td>
                <td align="right">{{ rupiah($item->saldo, 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>
