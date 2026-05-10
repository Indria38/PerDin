<?php

namespace App\Http\Controllers;

use App\Models\MasterPerjalanan;
use Illuminate\Http\Request;

class PengajuanPerdinController extends Controller
{
    public function pengajuan_perdin_baru_page(){
        $countperdinbaru = MasterPerjalanan::getCountPengajuanPerdinBaru();
        $perdinbaru = MasterPerjalanan::getPengajuanPerdinBaru();
        return view('sdm.pengajuan_perdin_page', ['countperdinbaru' => $countperdinbaru, 'pengajuanperdin' => 'baru', 'perdinbaru' => $perdinbaru]);
    }

    public function riwayat_pengajuan_perdin_page(){
        $countperdinbaru = MasterPerjalanan::getCountPengajuanPerdinBaru();
        $riwayatperdin = MasterPerjalanan::getRiwayatPengajuanPerdin();
        return view('sdm.pengajuan_perdin_page', ['countperdinbaru' => $countperdinbaru, 'pengajuanperdin' => 'riwayat', 'riwayatperdin' => $riwayatperdin]);
    }

    public function aksi_pengajuan_perdin($id){
        $pengajuanperdinbyid = MasterPerjalanan::getPerdinById($id);

        $kotaAsal = [
            'lat' => $pengajuanperdinbyid->kotaAsal->latitude,
            'lon' => $pengajuanperdinbyid->kotaAsal->longitude
        ];
        $kotaTujuan = [
            'lat' => $pengajuanperdinbyid->kotaTujuan->latitude,
            'lon' => $pengajuanperdinbyid->kotaTujuan->longitude
        ];
        $jarak = round($this->haversineDistance($kotaAsal, $kotaTujuan));

        $provinsiasal = $pengajuanperdinbyid->kotaAsal->provinsi;
        $provinsitujuan = $pengajuanperdinbyid->kotaTujuan->provinsi;
        $pulauasal = $pengajuanperdinbyid->kotaAsal->pulau;
        $pulautujuan = $pengajuanperdinbyid->kotaTujuan->pulau;
        $negeriasal = $pengajuanperdinbyid->kotaAsal->luar_negeri;
        $negeritujuan = $pengajuanperdinbyid->kotaTujuan->luar_negeri;

        $start = \Carbon\Carbon::parse($pengajuanperdinbyid->tanggal_awal);
        $end = \Carbon\Carbon::parse($pengajuanperdinbyid->tanggal_akhir);
        $diffDays = $end->diffInDays($start) + 1;

        if($jarak >= 0 && $jarak <= 60){
            $uangsaku = 0;
            $totaluangsaku = 'Rp. '.number_format($uangsaku, 0, ',', '.').',-';
            $uangsaku = 'Rp. '.number_format($uangsaku, 0, ',', '.').',-/Hari';
        } elseif($jarak >= 60 && $provinsiasal == $provinsitujuan){
            $uangsaku = 200000;
            $totaluangsaku = 'Rp. '.number_format($uangsaku * $diffDays, 0, ',', '.').',-';
            $uangsaku = 'Rp. '.number_format($uangsaku, 0, ',', '.').',-/Hari';
        } elseif($jarak >= 60 && $provinsiasal != $provinsitujuan && $pulauasal == $pulautujuan){
            $uangsaku = 250000;
            $totaluangsaku = 'Rp. '.number_format($uangsaku * $diffDays, 0, ',', '.').',-';
            $uangsaku = 'Rp. '.number_format($uangsaku, 0, ',', '.').',-/Hari';
        } elseif($jarak >= 60 && $provinsiasal != $provinsitujuan && $pulauasal != $pulautujuan){
            $uangsaku = 300000;
            $totaluangsaku = 'Rp. '.number_format($uangsaku * $diffDays, 0, ',', '.').',-';
            $uangsaku = 'Rp. '.number_format($uangsaku, 0, ',', '.').',-/Hari';
        } elseif($negeriasal != $negeritujuan){
            $uangsaku = 50;
            $totaluangsaku = number_format($uangsaku * $diffDays, 0, ',', '.').',- USD';
            $uangsaku = number_format($uangsaku, 0, ',', '.').',- USD/Hari';
        } else {
            $uangsaku = 0;
            $totaluangsaku = 'Rp. '.number_format($uangsaku * $diffDays, 0, ',', '.').',-';
            $uangsaku = 'Rp. '.number_format($uangsaku, 0, ',', '.').',-/Hari';
        }

        return view('sdm.persetujuan_pengajuan_perdin', ['pengajuanperdinbyid' => $pengajuanperdinbyid, 'diffDays' => $diffDays, 'jarak' => $jarak, 'uangsaku' => $uangsaku, 'totaluangsaku' => $totaluangsaku]);
    }

    private function haversineDistance($point1, $point2)
    {
        $lat1 = deg2rad($point1['lat']);
        $lon1 = deg2rad($point1['lon']);
        $lat2 = deg2rad($point2['lat']);
        $lon2 = deg2rad($point2['lon']);
        
        $earthRadius = 6371;
        
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        
        $a = sin($dlat / 2) * sin($dlat / 2) +
             cos($lat1) * cos($lat2) *
             sin($dlon / 2) * sin($dlon / 2);
        
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        
        $distance = $earthRadius * $c;
        
        return $distance;
    }

    public function aksi_pengajuan_perdin_process(Request $request){
        MasterPerjalanan::updateStatusPerdin($request->perdinid, $request->action);
        return redirect('/pengajuan_perdin_baru');
    }
}

// dd(session('role'), session()->all());
