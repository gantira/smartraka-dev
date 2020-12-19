@foreach ($ledgers as $key => $row)
    @hasrole('admin|superadmin')
    <h3>{{ $key }}</h3>
    @endhasrole
    @foreach ($row as $key => $item)
        <h4>{{ $key }}</h4>
        <table>
            <thead>
                <tr>
                    <th>Cabang</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th align="right">Debit</th>
                    <th align="right">Kredit</th>
                    <th align="right">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $value)
                    <tr>
                        <td>{{ $value->company }}</td>
                        <td>{{ $value->tanggal }}</td>
                        <td>{{ $value->uraian }}</td>
                        <td align="right">{{ $value->debit }}</td>
                        <td align="right">{{ $value->credit }}</td>
                        <td align="right">{{ $value->saldo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endforeach
