<?php

namespace App\Http\Controllers;

use App\Models\MasterPengguna;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register_page(){
        session(['components' => 'false']);
        return view('login_reg.register_page');
    }

    public function register_process(Request $request){
        $usernamedb = MasterPengguna::getUser($request->input('username'));
        $username = $request->input('username');
        $password = $request->input('password');
        $password2 = $request->input('password2');

        if($username == $usernamedb){
            return redirect('/register')->with('flash_message', 'Nama sudah digunakan');
        }else if($password == $password2){
            MasterPengguna::getNewUser($request->input('username'), $request->input('password'));
            return redirect('/login');
        }else if($password != $password2){
            return redirect('/register')->with('flash_message', 'Kata sandi tidak cocok');
        }else{
            return redirect('/register')->with('flash_message', 'Isi dengan benar');
        }
    }
}
