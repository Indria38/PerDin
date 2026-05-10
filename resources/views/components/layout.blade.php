<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    @if(session('components') == 'true')
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                @if(session('role') == 'Pegawai')
                    <li><a href="/perdinku">PerDinKu</a></li>
                @endif
                @if(session('role') == 'SDM')
                    <li><a href="/pengajuan_perdin_baru">Pengajuan PerDin</a></li>
                @endif
                @if(session('role') == 'Admin')
                    <li><a href="/master_kota">Master Kota</a></li>
                    <li><a href="/master_karyawan">Master Karyawan</a></li>
                @endif
            </ul>
        </div>

        <div class="page">
            <a href="/logout" style="text-align: right;">Log Out</a>
            {{ $slot }}
        </div>
    @endif

    @if(session('components') == 'false')
        {{ $slot }}
    @endif
</body>
</html>