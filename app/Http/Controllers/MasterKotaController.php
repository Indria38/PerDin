<?php

namespace App\Http\Controllers;

use App\Models\MasterKota;
use Illuminate\Http\Request;

class MasterKotaController extends Controller
{
    public function master_kota_page(){
        $kota = MasterKota::getAllKota();
        return view('admin.master_kota.master_kota_page', ['kota' => $kota]);
    }

    public function master_kota_tambah(){
        return view('admin.master_kota.master_kota_tambah');
    }

    public function master_kota_tambah_process(Request $request){
        $namakota = $request->input('namakota');
        $provinsi = $request->input('provinsi');
        $pulau = $request->input('pulau');
        $luarnegeri = $request->input('luarnegeri');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        MasterKota::getNewKota($namakota, $provinsi, $pulau, $luarnegeri, $latitude, $longitude);
        return redirect('/master_kota');
    }

    public function master_kota_edit($id){
        $kotabyid = MasterKota::getKotaById($id);
        return view('admin.master_kota.master_kota_edit', ['kotabyid' => $kotabyid]);
    }

    public static function master_kota_edit_process(Request $request){
        $id = $request->input('kotaid');
        $namakota = $request->input('namakota');
        $provinsi = $request->input('provinsi');
        $pulau = $request->input('pulau');
        $luarnegeri = $request->input('luarnegeri');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        MasterKota::updateKota($id, $namakota, $provinsi, $pulau, $luarnegeri, $latitude, $longitude);
        return redirect('/master_kota');
    }

    public static function master_kota_hapus_process($id){
        MasterKota::deleteKota($id);
        return redirect('/master_kota');
    }
}
