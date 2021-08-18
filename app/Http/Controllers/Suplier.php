<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import library Session
use Illuminate\Support\Facades\Session;

//import Library JWT
use \Firebase\JWT\JWT;

//import library Response
use Illuminate\Response;

//impor library validasi
use Illuminate\Support\Facades\Validator;

//impor fungsi encrypt
use Illuminate\Contracts\Encryption\DecryptException;

//impor model suplier
use App\M_Suplier;
use App\M_Admin;

class Suplier extends Controller
{
    public function login(){
        return view('login_sup.login');
    }

    public function masukSuplier(Request $request){
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required',
        ]);

        $cek = M_Suplier::where('email', $request->email)->count();

        $sup = M_Suplier::where('email', $request->email)->get();

        if($cek > 0){
            //email terdaftar
            foreach($sup as $su){
                if(decrypt($su->password) == $request->password){
                //jika password benar
                    $key = env('APP_KEY');
                    $data = array(
                        "id_suplier" => $su->id_suplier

                    );
                    // print_r($data);
                    $jwt = JWT::encode($data, $key);
                    // echo $jwt;

                    if(M_Suplier::where('id_suplier', $su->id_suplier)->update(
                        [
                            'token' => $jwt
                        ]
                    )){
                        //kalau berhasil update token di database
                        Session::put('token', $jwt);
                        return redirect('/listSuplier');

                    }else{
                        //jika password salah
                    return redirect('/login')->with('gagal','Token gagal diupdate');

                    }

                }else{
                    //jika password salah
                    return redirect('/login')->with('gagal','Password tidak sama');
                }
            }

        }else{
            return redirect('/login')->with('gagal','Email tidak terdaftar');
        }
    }

    public function suplierKeluar(){

        $token = Session::get('token');

        if(M_Suplier::where('token', $token)->update(
            [
                'token' => 'keluar'
            ]
        )){
            Session::put('token',"");
            return redirect('/');

        }else{
            return redirect('/login')->with('gagal','Anda gagal Logout');

        }

    }

    public function listSup(){
        $token = Session::get('token');

        $data['adm'] = M_Admin::where('token', $token)->first();

        $tokenDb = M_Admin::where('token', $token)->count();

        if($tokenDb > 0){
            $data['suplier'] = M_Suplier::paginate(15);
            return view('admin.listSup', $data);

        }else{
            return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silahkan login kembali');
        }
    }

    public function nonAktif($id){
        $token = Session::get('token');

        $tokenDb = M_Admin::where('token', $token)->count();

        if($tokenDb > 0){
           if(M_Suplier::where('id_suplier', $id)->update([
               "status" => "0"
           ])){
            return redirect('/listSup')->with('berhasil', 'Data berhasil di update');

           }else{
            return redirect('/listSup')->with('gagal', 'Data gagal di update');
           }

        }else{
            return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silahkan login kembali');
        }
    }

    public function Aktif($id){
        $token = Session::get('token');

        $tokenDb = M_Admin::where('token', $token)->count();

        if($tokenDb > 0){
           if(M_Suplier::where('id_suplier', $id)->update([
               "status" => "1"
           ])){
            return redirect('/listSup')->with('berhasil', 'Data berhasil di update');

           }else{
            return redirect('/listSup')->with('gagal', 'Data gagal di update');
           }

        }else{
            return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silahkan login kembali');
        }
    }

}
