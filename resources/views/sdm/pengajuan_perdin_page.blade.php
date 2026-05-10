<x-layout>

<title>Pengajuan Perdin</title>

<div class="pengajuan-perdin-header">
    <h1>Pengajuan Perdin</h1>
</div>

<div class="pengajuan-perdin-menu">
    <a href="pengajuan_perdin_baru" class="pengajuan-perdin-card {{ $pengajuanperdin == 'baru' ? 'active' : '' }}">
        <span class="pengajuan-perdin-card-link">Pengajuan Baru</span>
        <span class="pengajuan-perdin-badge">{{ $countperdinbaru }}</span>
    </a>
    <a href="riwayat_pengajuan_perdin" class="pengajuan-perdin-card {{ $pengajuanperdin == 'riwayat' ? 'active' : '' }}">
        <span class="pengajuan-perdin-card-link">Riwayat Pengajuan</span>
    </a>
</div>

<div class="pengajuan-perdin-table-container">
    @if($pengajuanperdin == 'baru')
        @if(count($perdinbaru) > 0)
            <table class="pengajuan-perdin-table">
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
                                <a href="pengajuan_perdin_baru/aksi/{{ $row->id }}" class="pengajuan-perdin-btn-aksi">+</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="pengajuan-perdin-empty">
                Tidak ada pengajuan baru
            </div>
        @endif
    @endif
</div>

<div class="pengajuan-perdin-table-container">
    @if($pengajuanperdin == 'riwayat')
        @if(count($riwayatperdin) > 0)
            <table class="pengajuan-perdin-table">
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
                            <td class="{{ strtolower($row->status) }}">{{ $row->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="pengajuan-perdin-empty">
                Tidak ada riwayat pengajuan
            </div>
        @endif
    @endif
</div>

</x-layout>