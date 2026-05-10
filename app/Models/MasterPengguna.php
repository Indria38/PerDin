<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPengguna extends Model
{
    protected $table = 'pengguna';
    public $timestamps = false;

    public static function getUser($username){
        $data = self::where('nama_pengguna', $username)->first();
        return $data;
    }

    public static function getNewUser($username, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        self::insert([
            'nama_pengguna' => $username,
            'kata_sandi' => $hashedPassword
        ]);
    }

    public static function getAllPengguna(){
        return self::get();
    }

    public static function getKaryawanById($id){
        return self::where('id', $id)->first();
    }

    public static function updateKaryawan($id, $posisi){
        self::where('id', $id)->update(['posisi' => $posisi]);
    }
}