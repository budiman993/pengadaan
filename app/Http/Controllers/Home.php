<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import library Session
use Illuminate\Support\Facades\Session;

//import Library JWT
use \Firebase\JWT\JWT;

//import Model Suplier
use App\M_Suplier;

//import Model Pengadaan
use App\M_Pengadaan;



class Home extends Controller
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

        $data['pengadaan'] = M_Pengadaan::where('status', '1')->paginate(15);
        return view('utama.home', $data);
    }
}
