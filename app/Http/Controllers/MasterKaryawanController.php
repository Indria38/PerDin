<?php

namespace App\Http\Controllers;

use App\Models\MasterPengguna;
use Illuminate\Http\Request;

class MasterKaryawanController extends Controller
{
    public static function master_karyawan_page(){
        $karyawan = MasterPengguna::getAllPengguna();
        return view('admin.master_karyawan.master_karyawan_page', ['karyawan' => $karyawan]);
    }

    public function master_karyawan_edit($id){
        $karyawanbyid = MasterPengguna::getKaryawanById($id);
        return view('admin.master_karyawan.master_karyawan_edit', ['karyawanbyid' => $karyawanbyid]);
    }

    public static function master_karyawan_edit_process(Request $request){
        $id = $request->input('idpengguna');
        $posisi = $request->input('posisi');
        MasterPengguna::updateKaryawan($id, $posisi);
        return redirect('/master_karyawan');
    }
}
