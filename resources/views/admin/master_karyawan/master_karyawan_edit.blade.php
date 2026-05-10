<x-layout>

<title>Edit Master Karyawan</title>

<div class="edit-karyawan-header">
    <h1>Edit Master Karyawan</h1>
    <a href="/master_karyawan" class="edit-karyawan-btn-close">&times;</a>
</div>

<div class="edit-karyawan-form-container">
    <form action="{{ route('master_karyawan_edit_process') }}" method="post">
    @csrf
        <div class="edit-karyawan-form-group">
            <label for="nama-karyawan">Nama Karyawan</label><br>
            <input type="text" name="namakaryawan" id="nama-karyawan" placeholder="{{ $karyawanbyid->nama_pengguna }}" disabled><br>
        </div>
        <div class="edit-karyawan-form-group">
            <label for="posisi">Posisi</label><br>
            <input type="text" name="posisi" id="posisi" value="{{ $karyawanbyid->posisi }}"><br>
        </div>
        <div class="edit-karyawan-form-group">
            <input type="hidden" name="idpengguna" id="idpengguna" value="{{ $karyawanbyid->id }}">
        </div>
        <button type="submit" class="edit-karyawan-btn-submit">Simpan</button>
    </form>
</div>

</x-layout>