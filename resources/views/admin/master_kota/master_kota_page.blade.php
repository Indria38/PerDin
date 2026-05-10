<x-layout>

<title>Master Kota</title>

<div class="master-kota-header">
    <h1>Master Kota</h1>
    <a href="master_kota_tambah" class="master-kota-btn-tambah">+ Tambah Kota</a>
</div>

<div class="master-kota-table-container">
    <table class="master-kota-table">
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
                    <td>
                        @if($row->luar_negeri == 'Ya')
                            <span class="master-kota-ln-ya">Ya</span>
                        @else
                            <span class="master-kota-ln-tidak">Tidak</span>
                        @endif
                    </td>
                    <!-- <td>{{ $row->luar_negeri }}</td> -->
                    <td>{{ $row->latitude }}</td>
                    <td>{{ $row->longitude }}</td>
                    <td>
                        <div class="master-kota-aksi">
                            <a href="master_kota/edit/{{ $row->id }}" class="master-kota-btn-edit">Edit</a>
                            <a href="master_kota/hapus/{{ $row->id }}" class="master-kota-btn-hapus" onclick="return confirm('Yakin ingin menghapus kota {{ $row->nama_kota }}?')">Hapus</a>
                        </div>
                        <!-- <a href="master_kota/edit/{{ $row->id }}">edit</a>
                        <a href="master_kota/hapus/{{ $row->id }}">hapus</a> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
</x-layout>