<x-layout>

<title>PerDinKu</title>

<div>
    <h1>PerDinKu</h1>
    <a href="/tambah_perdin">+ Tambah Perdin</a>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perdin as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
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
</div>

</x-layout>