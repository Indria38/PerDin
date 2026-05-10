<x-layout>

<title>Master Kota</title>

<div>
    <h1>Master Kota</h1>
    <a href="master_kota_tambah">+ Tambah Kota</a>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kota</th>
                <th>Provinsi</th>
                <th>Pulau</th>
                <th>Luar Negeri</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kota as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_kota }}</td>
                    <td>{{ $row->provinsi }}</td>
                    <td>{{ $row->pulau }}</td>
                    <td>{{ $row->luar_negeri }}</td>
                    <td>{{ $row->latitude }}</td>
                    <td>{{ $row->longitude }}</td>
                    <td>
                        <a href="master_kota/edit/{{ $row->id }}">edit</a>
                        <a href="master_kota/hapus/{{ $row->id }}">hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
</x-layout>