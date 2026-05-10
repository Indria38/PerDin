<x-layout>

<title>Edit Master Kota</title>

<div>
    <h1>Edit Master Kota</h1>
    <a href="/master_kota">x</a>
</div>

<div>
    <form action="{{ route('master_kota_edit_process') }}" method="post">
    @csrf
        <label for="nama-kota">Nama Kota</label><br>
        <input type="text" name="namakota" id="nama-kota" value="{{ $kotabyid->nama_kota }}" required><br>
        <label for="provinsi">Provinsi</label><br>
        <input type="text" name="provinsi" id="provinsi" value="{{ $kotabyid->provinsi }}" required><br>
        <label for="pulau">Pulau</label><br>
        <input type="text" name="pulau" id="pulau" value="{{ $kotabyid->pulau }}" required><br>                
        <label for="luar-negeri">Luar Negeri</label><br>
        <input type="radio" name="luarnegeri" value="Ya" {{ ($kotabyid->luar_negeri == 'Ya') ? 'checked' : '' }} required> Ya
        <input type="radio" name="luarnegeri" value="Tidak" {{ ($kotabyid->luar_negeri == 'Tidak') ? 'checked' : '' }} required> Tidak<br>
        <label for="latitude">Latitude</label><br>
        <input type="text" name="latitude" id="latitude" value="{{ $kotabyid->latitude }}" required><br>
        <label for="longitude">Longitude</label><br>
        <input type="text" name="longitude" id="longitude" value="{{ $kotabyid->longitude }}" required><br>
        <input type="hidden" name="kotaid" id="kotaid" value="{{ $kotabyid->id }}">
        <button type="submit">Simpan</button>
    </form>
</div>

</x-layout>