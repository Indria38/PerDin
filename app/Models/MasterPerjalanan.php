<?php

namespace App\Models;

use App\Models\MasterKota;
use Illuminate\Database\Eloquent\Model;

class MasterPerjalanan extends Model
{
    protected $table = 'dataperjalanan';
    public $timestamps = false;

    public function pengguna(){
        return $this->belongsTo(MasterPengguna::class, 'id_pengguna', 'id');
    }

    public function kotaAsal(){
        return $this->belongsTo(MasterKota::class, 'id_kota_asal', 'id');
    }
    
    public function kotaTujuan(){
        return $this->belongsTo(MasterKota::class, 'id_kota_tujuan', 'id');
    }

    public static function getPerdinku(){
        return self::with(['kotaAsal:id,nama_kota', 'kotaTujuan:id,nama_kota'])
            ->where('id_pengguna', session('userid'))
            ->get();
    }

    public static function getNewPerdin($idpengguna, $kotaasal, $kotatujuan, $tanggalawal, $tanggalakhir, $keterangan){
        self::insert([
            'id_pengguna' => $idpengguna,
            'id_kota_asal' => $kotaasal,
            'id_kota_tujuan' => $kotatujuan,
            'tanggal_awal' => $tanggalawal,
            'tanggal_akhir' => $tanggalakhir,
            'keterangan' => $keterangan
        ]);
    }

    public static function getCountPengajuanPerdinBaru(){
        return self::where('status', 'Pending')
            ->count();
    }

    public static function getPengajuanPerdinBaru(){
        return self::with(['pengguna:id,nama_pengguna', 'kotaAsal:id,nama_kota', 'kotaTujuan:id,nama_kota'])
            ->where('status', 'Pending')
            ->get();
    }

    public static function getRiwayatPengajuanPerdin(){
        return self::with(['pengguna:id,nama_pengguna', 'kotaAsal:id,nama_kota', 'kotaTujuan:id,nama_kota'])
            ->whereNot('status', 'Pending')
            ->get();
    }

    public static function getPerdinById($id){
        return self::with(['pengguna', 'kotaAsal', 'kotaTujuan'])
            ->where('id', $id)
            ->first();
    }

    public static function updateStatusPerdin($id, $status){
        self::where('id', $id)->update(['status' => $status]);
    }
    
    // public static function getTes(){
    //     $data = MasterKota::select('nama_kota', 'pulau')
    //         ->distinct('nama_kota')
    //         ->get();
    //     return $data;
    // }
}
