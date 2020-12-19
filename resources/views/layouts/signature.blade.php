<br>
<br>
<br>

<table style="border: none;">
    <tr>
        @foreach ($signatures as $row)
            <td align="center" style="vertical-align: 0%;">
                {{ $row->sebagai }}
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                {{ $row->user->name }}</td>
        @endforeach
    </tr>
</table>
