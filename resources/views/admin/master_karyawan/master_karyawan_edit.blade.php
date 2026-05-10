<x-layout>

<title>Edit Master Karyawan</title>

<div>
    <h1>Edit Master Karyawan</h1>
    <a href="/master_karyawan">x</a>
</div>

<div>
    <form action="{{ route('master_karyawan_edit_process') }}" method="post">
    @csrf
        <label for="nama-karyawan">Nama Karyawan</label><br>
        <input type="text" name="namakaryawan" id="nama-karyawan" placeholder="{{ $karyawanbyid->nama_pengguna }}" disabled><br>
        <label for="posisi">Posisi</label><br>
        <input type="text" name="posisi" id="posisi" value="{{ $karyawanbyid->posisi }}"><br>
        <input type="hidden" name="idpengguna" id="idpengguna" value="{{ $karyawanbyid->id }}">
        <button type="submit">Simpan</button>
    </form>
</div>

</x-layout>