<!DOCTYPE html>

<head>
    <title>Laporan Neraca</title>

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

    <table class="table table-sm table-bordered table-hover">
        @forelse ($neraca as $company => $item)
            <tr>
                <td colspan="3" class="text-uppercase text-center bg-green text-white h1">{{ $company }}</td>
            </tr>
            @foreach ($item as $label => $row)
                <tr>
                    <td colspan="3" class="lead text-uppercase bg-light lead"> {{ $label }}</td>
                </tr>
                @foreach ($row as $index => $account)
                    <tr>
                        <td colspan="3" class="font-weight-lighter text-muted">{{ $index }}</td>
                    </tr>
                    @foreach ($account as $key => $val)
                        <tr>
                            <td class="w-50">- {{ $key }}</td>
                            <td class="w-25 text-right">{{ rupiah($val, 2) }}</td>
                            <td></td>
                        </tr>
                        @if ($loop->last)
                            <tr class="font-weight-bold text-muted">
                                <td>Total {{ $index }}</td>
                                <td class="text-right">{{ rupiah($account->sum(), 2) }}</td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($loop->last)
                        <tr class="font-weight-bold bg-light">
                            <td class="text-uppercase">TOTAL {{ $label }}</td>
                            <td></td>
                            <td class="text-right">{{ rupiah($item[$label]->collapse()->sum(), 2) }}</td>
                        </tr>
                    @endif
                @endforeach
    
            @endforeach
        @empty
            Tidak ada data
        @endforelse
    </table>
    



    @include('layouts.signature')

</body>

</html>
