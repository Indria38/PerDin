<?php

namespace App\Http\Controllers;

use App\Models\MasterKota;
use App\Models\MasterPerjalanan;
use Illuminate\Http\Request;

class PerdinkuController extends Controller
{
    public function perdinku_page(){
        $perdin = MasterPerjalanan::getPerdinku();
        return view('pegawai.perdinku_page', ['perdin' => $perdin]);
    }

    public function tambah_perdin(){
        $data_kota = MasterKota::getDropdownKota();
        return view('pegawai.tambah_perdin', ['data_kota' => $data_kota]);
    }

    public function tambah_perdin_process(Request $request){
        if($request->action == 'submit'){
            $kotaasal = $request->input('kotaasal');
            $kotatujuan = $request->input('kotatujuan');
            $tanggalawal = $request->input('tanggalawal');
            $tanggalakhir = $request->input('tanggalakhir');

            if($kotaasal != '' && $kotatujuan != '' && $tanggalawal != '' && $tanggalakhir != ''){
                MasterPerjalanan::getNewPerdin(session('userid'), $kotaasal, $kotatujuan, $tanggalawal, $tanggalakhir, $request->input('keterangan'));
                return redirect('/perdinku');
            } else {
                return redirect('/tambah_perdin')->with('flash_message', 'Isi dengan benar');
            }
        } else{
            return redirect('/perdinku');
        }
    }
}

// header('Content-Type: application/json');
// echo json_encode($perdin, JSON_PRETTY_PRINT);
// die();