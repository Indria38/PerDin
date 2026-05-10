<x-layout>

<title>Tambah Kota</title>

<div>
    <h1>Tambah Kota</h1>
    <a href="/master_kota">x</a>
</div>

<div>
    <form action="{{ route('master_kota_tambah_process') }}" method="post">
    @csrf
        <label for="nama-kota">Nama Kota</label><br>
        <input type="text" name="namakota" id="nama-kota" required><br>
        <label for="provinsi">Provinsi</label><br>
        <input type="text" name="provinsi" id="provinsi" required><br>
        <label for="pulau">Pulau</label><br>
        <input type="text" name="pulau" id="pulau" required><br>                
        <label for="luar-negeri">Luar Negeri</label><br>
        <input type="radio" name="luarnegeri" value="Ya" required> Ya
        <input type="radio" name="luarnegeri" value="Tidak" required> Tidak<br>
        <label for="latitude">Latitude</label><br>
        <input type="text" name="latitude" id="latitude" required><br>
        <label for="longitude">Longitude</label><br>
        <input type="text" name="longitude" id="longitude" required><br>
        <button type="submit">Tambah</button>
    </form>
</div>

</x-layout>