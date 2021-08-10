<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import library Session
use Illuminate\Support\Facades\Session;

//impor library validasi
use Illuminate\Support\Facades\Validator;

//impor fungsi encrypt
use Illuminate\Contracts\Encryption\DecryptException;

//impor model suplier
use App\M_Suplier;



class Registrasi extends Controller
{
    public function index(){
        $key = env('APP_KEY');
        
        $token = Session::get('token');
        $tokenDb = M_Suplier::where('token', $token)->count();

        if($tokenDb > 0){
            $data['token'] = $token;
        }else{
            $data['token'] = "kosong";
        }
        return view('registrasi.registrasi', $data);
    }

    public function regis(Request $request){
       
        // dd($request->all());
        $this->validate($request, 
        [
            'nama_usaha' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'npwp' => 'required',
            'password' => 'required'
        ]
    );
    
    if(M_Suplier::create(
        [
            'nama_usaha' => $request->nama_usaha,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_npwp' => $request->npwp,
            'password' => encrypt($request->password),
            'token' => $request->_token
            
        ]
    )){
        return redirect('/registrasi')->with('berhasil', 'Data berhasil disimpan');

    }else{
        return redirect('/registrasi')->with('gagal', 'Data gagal disimpan');

    }


    }
}
