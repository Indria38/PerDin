<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKota extends Model
{
    protected $table = 'datakota';
    public $timestamps = false;

    public static function getDropdownKota(){
        return self::distinct('nama_kota')->get();
    }

    public static function getAllKota(){
        return self::get();
    }

    public static function getNewKota($namakota, $provinsi, $pulau, $luarnegeri, $latitude, $longitude){
        self::insert([
            'nama_kota' => $namakota,
            'provinsi' => $provinsi,
            'pulau' => $pulau,
            'luar_negeri' => $luarnegeri,
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
    }

    public static function getKotaById($id){
        return self::where('id', $id)->first();
    }

    public static function updateKota($id, $namakota, $provinsi, $pulau, $luarnegeri, $latitude, $longitude){
        self::where('id', $id)->update([
                'nama_kota' => $namakota,
                'provinsi' => $provinsi,
                'pulau' => $pulau,
                'luar_negeri' => $luarnegeri,
                'latitude' => $latitude,
                'longitude' => $longitude
            ]);
    }

    public static function deleteKota($id){
        self::where('id', $id)->delete();
    }
}
