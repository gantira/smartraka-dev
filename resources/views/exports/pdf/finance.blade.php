<!DOCTYPE html>

<head>
    <title>Laporan Keuangan</title>

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
    



    @include('layouts.signature')

</body>

</html>
