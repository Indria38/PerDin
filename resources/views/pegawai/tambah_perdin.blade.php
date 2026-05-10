<x-layout>

<title>Tambah Perdin</title>

<div>
    <h1>Tambah Perdin</h1>
    <a href="/perdinku">x</a>
</div>

<div>
    <ul>
        <li>
            <form action="{{ route('tambah_perdin_process') }}" method="post">
            @csrf
                <label for="kota-asal">Kota</label><br>
                <select name="kotaasal" id="kota-asal">
                    <option value="">Pilih Kota</option>
                    @foreach ($data_kota as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_kota }}</option>
                    @endforeach
                </select>            
                <label for="kota-tujuan">-></label>
                <select name="kotatujuan" id="kota-tujuan">
                    <option value="">Pilih Kota</option>
                    @foreach ($data_kota as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_kota }}</option>
                    @endforeach
                </select><br>
                <label for="tanggal-awal">Tanggal</label><br>
                <input type="date" name="tanggalawal" id="tanggal-awal" onchange="document.getElementById('tanggal-akhir').min = this.value">
                <label for="tanggal-akhir">-></label>
                <input type="date" name="tanggalakhir" id="tanggal-akhir" onchange="document.getElementById('tanggal-awal').max = this.value"><br>
                <label for="keterangan">Keterangan</label><br>
                <textarea type="text" name="keterangan" id="keterangan"></textarea><br>
                <div>
                    <h2>Total Perjalanan Dinas</h2>
                    <p id="jumlah-hari">0 Hari</p>
                </div>
                <button type="submit" name="action" value="back">Kembali</button>
                <button type="submit" name="action" value="submit">Tambah</button>
            </form>
        </li>
        <li class="warn">
            {{ session()->get('flash_message') ?? '' }}
        </li>
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