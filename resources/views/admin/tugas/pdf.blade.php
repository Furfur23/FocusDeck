<h1 align="center">Data Tugas</h1>
<h2 align="center">FocusDeck</h2>
<hr>
<table width="100%" cellspacing="0" cellpadding="5" border="1">
    <thead>
        <tr>
            <th width="20" align="center">No</th>
            <th width="20" align="center">Nama Karyawan</th>
            <th width="20" align="center">Tugas</th>
            <th width="20" align="center">Tanggal Mulai</th>
            <th width="20" align="center">Tanggal Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tugas as $item)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->tugas }}</td>
            <td align="center">{{ $item->tanggal_mulai }}</td>
            <td align="center">{{ $item->tanggal_selesai }}</td>
        </tr>
        @endforeach
    </tbody>
</table>