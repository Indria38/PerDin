<x-layout>

<title>Persetujuan Perdin Pegawai</title>

<div class="persetujuan-perdin-header">
    <h1>Persetujuan Pengajuan Perdin</h1>
    <a href="/pengajuan_perdin_baru" class="persetujuan-perdin-btn-close">&times;</a>
</div>

<div class="persetujuan-perdin-form-container">
    <form action="{{ route('aksi_pengajuan_perdin_process') }}" method="post" id="form-persetujuan-perdin">
    @csrf
        <div class="persetujuan-perdin-form-group">
            <label for="nama-pengguna" class="persetujuan-perdin-label">Nama</label><br>
            <input type="text" name="namapengguna" id="nama-pengguna" placeholder="{{ $pengajuanperdinbyid->pengguna->nama_pengguna }}" disabled><br>
        </div>
        <div class="persetujuan-perdin-form-group">
            <label for="kota-asal" class="persetujuan-perdin-label">Kota</label><br>
            <div class="persetujuan-perdin-row">
                <select name="kotaasal" id="kota-asal" disabled>
                    <option value="">{{ $pengajuanperdinbyid->kotaAsal->nama_kota }}</option>
                </select>
                <label for="kota-tujuan" class="persetujuan-perdin-separator">&rarr;</label>
                <select name="kotatujuan" id="kota-tujuan" disabled>
                    <option value="">{{ $pengajuanperdinbyid->kotaTujuan->nama_kota }}</option>
                </select><br>
            </div>
        </div>
        <div class="persetujuan-perdin-form-group">
            <label for="tanggal-awal" class="persetujuan-perdin-label">Tanggal</label><br>
            <div class="persetujuan-perdin-row">
                <input type="date" name="tanggalawal" id="tanggal-awal" value="{{ $pengajuanperdinbyid->tanggal_awal }}" disabled>
                <label for="tanggal-akhir" class="persetujuan-perdin-separator">&rarr;</label>
                <input type="date" name="tanggalakhir" id="tanggal-akhir" value="{{ $pengajuanperdinbyid->tanggal_akhir }}" disabled><br>
            </div>
        </div>
        <div class="persetujuan-perdin-form-group">
            <label for="keterangan" class="persetujuan-perdin-label">Keterangan</label><br>
            <textarea type="text" name="keterangan" id="keterangan" placeholder="{{ $pengajuanperdinbyid->keterangan }}" disabled></textarea><br>
        </div>
        <div class="persetujuan-perdin-form-group">
            <table class="persetujuan-perdin-summary-table">
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
        <div class="persetujuan-perdin-button-group">
            <button type="submit" name="action" value="Rejected" class="persetujuan-perdin-btn persetujuan-perdin-btn-reject">Reject</button>
            <button type="submit" name="action" value="Approved" class="persetujuan-perdin-btn persetujuan-perdin-btn-approve">Approve</button>
        </div>
    </form>
</div>

</x-layout>