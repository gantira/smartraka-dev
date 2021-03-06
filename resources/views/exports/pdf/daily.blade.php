<!DOCTYPE html>
<head>
    <title>Laporan Harian</title>

    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }

    </style>
</head>

<body>
    <h3>{{ auth()->user()->company->name }}</h3>
    <p>{{ $title }}</p>

    <table>
        <thead>
            <tr>
                <th align="left">Cabang</th>
                <th align="left">Tanggal</th>
                <th align="left">Kategori</th>
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

    @include('layouts.signature')

</body>

</html>
