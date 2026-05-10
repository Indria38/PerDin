<x-layout>

<title>Pengajuan Perdin</title>

<div>
    <h1>Pengajuan Perdin</h1>
</div>

<div>
    <ul>
        <li>
            <a href="pengajuan_perdin_baru">Pengajuan Baru</a>
            <p>{{ $countperdinbaru }}</p>
        </li>
        <li>
            <a href="riwayat_pengajuan_perdin">Riwayat Pengajuan</a>
        </li>
    </ul>
</div>

<div>
    @if($pengajuanperdin == 'baru')
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perdinbaru as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->pengguna->nama_pengguna }}</td>
                    <td>{{ $row->kotaAsal->nama_kota.' -> '.$row->kotaTujuan->nama_kota }}</td>
                    <td>
                        @php
                            $start = \Carbon\Carbon::parse($row->tanggal_awal);
                            $end = \Carbon\Carbon::parse($row->tanggal_akhir);
                            $diffDays = $end->diffInDays($start) + 1;
                        @endphp
                        {{ $row->tanggal_awal.' -> '.$row->tanggal_akhir.' ('.$diffDays.' hari)' }}
                    </td>
                    <td>{{ $row->keterangan }}</td>
                    <td>
                        <a href="pengajuan_perdin_baru/aksi/{{ $row->id }}">+</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<div>
    @if($pengajuanperdin == 'riwayat')
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatperdin as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->pengguna->nama_pengguna }}</td>
                    <td>{{ $row->kotaAsal->nama_kota.' -> '.$row->kotaTujuan->nama_kota }}</td>
                    <td>
                        @php
                            $start = \Carbon\Carbon::parse($row->tanggal_awal);
                            $end = \Carbon\Carbon::parse($row->tanggal_akhir);
                            $diffDays = $end->diffInDays($start) + 1;
                        @endphp
                        {{ $row->tanggal_awal.' -> '.$row->tanggal_akhir.' ('.$diffDays.' hari)' }}
                    </td>
                    <td>{{ $row->keterangan }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

</x-layout>