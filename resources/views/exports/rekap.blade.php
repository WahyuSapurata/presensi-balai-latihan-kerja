<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username / Password</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->name }}<br>
                <span class="text-muted">{{ $item->hint }}</span>
            </td>
            <td>{{ $item->jkel }}</td>
            <td>{{ $item->jurusan }}</td>
            <td>{{ $item->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>