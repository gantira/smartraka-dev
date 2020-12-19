<!DOCTYPE html>

<head>
    <title>Laporan Jurnal</title>

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
                <th align="left">Uraian</th>
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

    @include('layouts.signature')

</body>

</html>
