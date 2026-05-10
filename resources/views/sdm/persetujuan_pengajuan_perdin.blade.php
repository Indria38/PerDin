<x-layout>

<title>Persetujuan Perdin Pegawai</title>

<div>
    <h1>Persetujuan Pengajuan Perdin</h1>
    <a href="/pengajuan_perdin_baru">x</a>
</div>

<div>
    <form action="{{ route('aksi_pengajuan_perdin_process') }}" method="post">
    @csrf
        <label for="nama-pengguna">Nama</label><br>
        <input type="text" name="namapengguna" id="nama-pengguna" placeholder="{{ $pengajuanperdinbyid->pengguna->nama_pengguna }}" disabled><br>
        <label for="kota-asal">Kota</label><br>
        <select name="kotaasal" id="kota-asal" disabled>
            <option value="">{{ $pengajuanperdinbyid->kotaAsal->nama_kota }}</option>
        </select>
        <label for="kota-tujuan">-></label>
        <select name="kotatujuan" id="kota-tujuan" disabled>
            <option value="">{{ $pengajuanperdinbyid->kotaTujuan->nama_kota }}</option>
        </select><br>
        <label for="tanggal-awal">Tanggal</label><br>
        <input type="date" name="tanggalawal" id="tanggal-awal" value="{{ $pengajuanperdinbyid->tanggal_awal }}" disabled>
        <label for="tanggal-akhir">-></label>
        <input type="date" name="tanggalakhir" id="tanggal-akhir" value="{{ $pengajuanperdinbyid->tanggal_akhir }}" disabled><br>
        <label for="keterangan">Keterangan</label><br>
        <textarea type="text" name="keterangan" id="keterangan" placeholder="{{ $pengajuanperdinbyid->keterangan }}" disabled></textarea><br>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Total Hari</th>
                        <th>Jarak Tempuh</th>
                        <th>Total Uang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $diffDays.' Hari' }}</td>
                        <td>
                            <p>{{ $jarak.' KM' }}</p>
                            <p>{{ $uangsaku }}</p>
                        </td>
                        <td>{{ $totaluangsaku }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="perdinid" id="perdinid" value="{{ $pengajuanperdinbyid->id }}">
        <button type="submit" name="action" value="Rejected">Reject</button>
        <button type="submit" name="action" value="Approved">Approve</button>
    </form>
</div>

</x-layout>