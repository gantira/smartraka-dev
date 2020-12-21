<!DOCTYPE html>

<head>
    <title>Laporan Buku Besar</title>

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

    @foreach ($ledgers as $key => $row)

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


    @include('layouts.signature')

</body>

</html>
