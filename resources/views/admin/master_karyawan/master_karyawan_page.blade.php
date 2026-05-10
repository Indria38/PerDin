<x-layout>

<title>Master Karyawan</title>

<div>
    <h1>Master Karyawan</h1>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Karyawan</th>
                <th>Posisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_pengguna }}</td>
                    <td>{{ $row->posisi }}</td>
                    <td>
                        <a href="master_karyawan/edit/{{ $row->id }}">edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-layout>