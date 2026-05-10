<?php

namespace App\Http\Controllers;

use App\Models\MasterPengguna;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_page(){
        session(['components' => 'false']);
        return view('login_reg.login_page');
    }

    public function login_process(Request $request){
        $username = MasterPengguna::getUser($request->input('username'));

        if($username && $username['posisi']){
            if(password_verify(
                $request->input('password'), 
                $username['kata_sandi'])
                ){
                    session(['components' => 'true', 'userid' => $username['id'], 'username' => $username['nama_pengguna'], 'role' => $username['posisi']]);
                    return redirect('/home');
            }else{
                return redirect('/login')->with('flash_message', 'Kata sandi salah');
            }
        }else{
            return redirect('/login')->with('flash_message', 'Akun tidak ditemukan');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }
}
