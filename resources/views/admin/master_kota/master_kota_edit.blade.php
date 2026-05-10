<x-layout>

<title>Edit Master Kota</title>

<div class="edit-kota-header">
    <h1>Edit Master Kota</h1>
    <a href="/master_kota" class="edit-kota-btn-close">&times;</a>
</div>

<div>
    <form action="{{ route('master_kota_edit_process') }}" method="post" class="edit-kota-form-container">
    @csrf
        <div class="edit-kota-form-group">
            <label for="nama-kota">Nama Kota</label><br>
            <input type="text" name="namakota" id="nama-kota" value="{{ $kotabyid->nama_kota }}" required><br>
        </div>
        <div class="edit-kota-form-group">
            <label for="provinsi">Provinsi</label><br>
            <input type="text" name="provinsi" id="provinsi" value="{{ $kotabyid->provinsi }}" required><br>
        </div>
        <div class="edit-kota-form-group">
            <label for="pulau">Pulau</label><br>
            <input type="text" name="pulau" id="pulau" value="{{ $kotabyid->pulau }}" required><br>              
            <label for="luar-negeri">Luar Negeri</label><br>
            <div class="edit-kota-radio-group">
                <label class="edit-kota-radio-label">
                    <input type="radio" name="luarnegeri" value="Ya" {{ ($kotabyid->luar_negeri == 'Ya') ? 'checked' : '' }} required> Ya
                </label>
                <label class="edit-kota-radio-label">
                    <input type="radio" name="luarnegeri" value="Tidak" {{ ($kotabyid->luar_negeri == 'Tidak') ? 'checked' : '' }} required> Tidak<br>
                </label>
            </div>
        </div>
        <div class="edit-kota-form-group">
            <label for="latitude">Latitude</label><br>
            <input type="text" name="latitude" id="latitude" value="{{ $kotabyid->latitude }}" required><br>
        </div>
        <div class="edit-kota-form-group">
            <label for="longitude">Longitude</label><br>
            <input type="text" name="longitude" id="longitude" value="{{ $kotabyid->longitude }}" required><br>
        </div>
        <input type="hidden" name="kotaid" id="kotaid" value="{{ $kotabyid->id }}">
        <button type="submit" class="edit-kota-btn-submit">Simpan</button>
    </form>
</div>

</x-layout>