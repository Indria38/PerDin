<x-layout>

<title>Tambah Kota</title>

<div class="tambah-kota-header">
    <h1>Tambah Kota</h1>
    <a href="/master_kota" class="tambah-kota-btn-close">&times;</a>
</div>

<div class="tambah-kota-form-container">
    <form action="{{ route('master_kota_tambah_process') }}" method="post">
    @csrf
        <div class="tambah-kota-form-group">
            <label for="nama-kota">Nama Kota</label><br>
            <input type="text" name="namakota" id="nama-kota" required><br>
        </div>
        <div class="tambah-kota-form-group">
            <label for="provinsi">Provinsi</label><br>
            <input type="text" name="provinsi" id="provinsi" required><br>
        </div>
        <div class="tambah-kota-form-group">
            <label for="pulau">Pulau</label><br>
            <input type="text" name="pulau" id="pulau" required><br> 
        </div>
        <div class="tambah-kota-form-group">               
            <label for="luar-negeri">Luar Negeri</label><br>
            <div class="tambah-kota-radio-group">
                <label class="tambah-kota-radio-label">
                    <input type="radio" name="luarnegeri" value="Ya" required> Ya
                </label>
                <label class="tambah-kota-radio-label">
                    <input type="radio" name="luarnegeri" value="Tidak" required> Tidak
                </label>
            </div>
        </div>
        <div class="tambah-kota-form-group">
            <label for="latitude">Latitude</label><br>
            <input type="text" name="latitude" id="latitude" required><br>
        </div>
        <div class="tambah-kota-form-group">
            <label for="longitude">Longitude</label><br>
            <input type="text" name="longitude" id="longitude" required><br>
        </div>
        <button type="submit" class="tambah-kota-btn-submit">Tambah</button>
    </form>
</div>

</x-layout>