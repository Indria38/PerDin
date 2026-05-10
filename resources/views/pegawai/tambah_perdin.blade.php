<x-layout>

<title>Tambah Perdin</title>

<div class="tambah-perdin-header">
    <h1>Tambah Perdin</h1>
    <a href="/perdinku" class="tambah-perdin-btn-close">&times;</a>
</div>

<div class="tambah-perdin-form-container">
    <ul>
        <li>
            <form action="{{ route('tambah_perdin_process') }}" method="post" id="form-tambah-perdin">
            @csrf
                <div class="tambah-perdin-form-group">
                    <label for="kota-asal" class="tambah-perdin-label">Kota</label><br>
                    <div class="tambah-perdin-row">
                        <select name="kotaasal" id="kota-asal">
                            <option value="">Pilih Kota</option>
                            @foreach ($data_kota as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kota }}</option>
                            @endforeach
                        </select>            
                        <label for="kota-tujuan" class="tambah-perdin-separator">&rarr;</label>
                        <!-- <span class="tambah-perdin-separator">&rarr;</span> -->
                        <select name="kotatujuan" id="kota-tujuan">
                            <option value="">Pilih Kota</option>
                            @foreach ($data_kota as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kota }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>
                <div class="tambah-perdin-form-group">
                    <label for="tanggal-awal" class="tambah-perdin-label">Tanggal</label><br>
                    <div class="tambah-perdin-row">
                        <input type="date" name="tanggalawal" id="tanggal-awal" onchange="document.getElementById('tanggal-akhir').min = this.value">
                        <label for="tanggal-akhir" class="tambah-perdin-separator">&rarr;</label>
                        <input type="date" name="tanggalakhir" id="tanggal-akhir" onchange="document.getElementById('tanggal-awal').max = this.value"><br>
                    </div>
                </div>
                <div class="tambah-perdin-form-group">
                    <label for="keterangan" class="tambah-perdin-label">Keterangan</label><br>
                    <textarea type="text" name="keterangan" id="keterangan"></textarea><br>
                </div>                
                <div class="tambah-perdin-total-box">
                    <h2>Total Perjalanan Dinas</h2>
                    <p id="jumlah-hari">0 Hari</p>
                </div>
                <div class="tambah-perdin-button-group">
                    <button type="submit" name="action" value="back" class="tambah-perdin-btn tambah-perdin-btn-back">Kembali</button>
                    <button type="submit" name="action" value="submit" class="tambah-perdin-btn tambah-perdin-btn-submit">Tambah</button>
                </div>
            </form>
        </li>
        @if(session()->has('flash_message'))
            <li class="tambah-perdin-flash-message">
                {{ session('flash_message') }}
            </li>
        @endif
    </ul>
</div>

<script>
    document.getElementById('tanggal-awal').addEventListener('change', hitungHari);
    document.getElementById('tanggal-akhir').addEventListener('change', hitungHari);

    function hitungHari() {
        let tglAwal = document.getElementById('tanggal-awal').value;
        let tglAkhir = document.getElementById('tanggal-akhir').value;
        let keterangan = document.getElementById('jumlah-hari');
        
        if (tglAwal && tglAkhir) {
            let date1 = new Date(tglAwal);
            let date2 = new Date(tglAkhir);
            
            let selisihWaktu = date2.getTime() - date1.getTime();
            let selisihHari = Math.ceil((selisihWaktu / (1000 * 60 * 60 * 24)) + 1);
            
            if (selisihHari > 0) {
                keterangan.innerHTML = `${selisihHari} Hari`;
            } else {
                keterangan.innerHTML = '0 Hari';
            }
        } else {
            keterangan.innerHTML = '0 Hari';
        }
    }
</script>

</x-layout>