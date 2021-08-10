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

use App\M_Admin;
use App\M_Pengajuan;
use App\M_Suplier;
use App\M_Pengadaan;
use App\M_Laporan;

class Pengajuan extends Controller
{
  public function pengajuan(){
    
    $key = env('APP_KEY');

    $token = Session::get('token');

    $tokenDb = M_Admin::where('token', $token)->count();

    if($tokenDb > 0){
      $pengajuan = M_Pengajuan::where('status', '1')->paginate(15);
      $dataP = array();
      foreach($pengajuan as $p){
        $pengadaan = M_Pengadaan::where('id_pengadaan', $p->id_pengadaan)->first();

        $sup = M_Suplier::where('id_suplier', $p->id_suplier)->first();

        $dataP[] = array(
          "id_pengajuan" => $p->id_pengajuan,
          "nama_pengadaan" => $pengadaan->nama_pengadaan,
          "gambar" => $pengadaan->gambar,
          "anggaran" => $pengadaan->anggaran,
          "proposal" => $p->proposal,
          "anggaran_pengajuan" => $p->anggaran,
          "status_pengajuan" => $p->status,
          "nama_suplier" => $sup->nama_usaha,
          "email_suplier" => $sup->email,
          "alamat_suplier" => $sup->alamat

        );
      }
      $data['pengajuan'] = $dataP;
        return view('pengajuan.list', $data);
    }else{
        return redirect('/masukAdmin')->with('gagal','Silahkan Login terlebih dahulu');
    }   
  }

  public function tambahPengajuan(Request $request){

    $key = env('APP_KEY');
    $token = Session::get('token');
    $tokenDb = M_Suplier::where('token', $token)->count();

    $decode = JWT::decode($token, $key, array('HS256'));
    $decode_array = (array) $decode;


    if($tokenDb > 0){
        $this->validate($request,[
            'id_pengadaan' => 'required',
            'proposal'  => 'required|mimes:pdf|max:10000',
            'anggaran'  => 'required'
        ]);

        $cekPengajuan = M_Pengajuan::where('id_suplier', $decode_array['id_suplier'])->where('id_pengadaan', $request->id_pengadaan)->count();

        if($cekPengajuan == 0){

          $path = $request->file('proposal')->store('public/proposal');

        if(M_Pengajuan::create([
            "id_pengadaan" => $request->id_pengadaan,
            "id_suplier" => $decode_array['id_suplier'],
            "proposal" => $path,
            "anggaran" => $request->anggaran
        ])){
            return redirect('/listSuplier')->with('berhasil', 'Pengajuan berhasil disimpan, Mohon ditunggu');

        }else{
            return redirect('/listSuplier')->with('gagal', 'Pengajuan gagal, Mohon Hubungi Admin');
        }

        }else{
          return redirect('/listSuplier')->with('gagal', 'Pengajuan sudah pernah dilakukan');
        }

    }else{
        return redirect('/masukSuplier')->with('gagal', 'Anda sudah logout, silahkan login kembali');
    }
}

    public function terimaPengajuan($id){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token', $token)->count();

      if($tokenDb > 0){
        if(M_Pengajuan::where('id_pengajuan', $id)->update(
          [
            "status" => "2"
          ]
        )){
          
          return redirect('/pengajuan')->with('berhasil', 'Status Pengajuan Berhasil diubah');
        }else{
          return redirect('/pengajuan')->with('gagal', 'Status Pengajuan Gagal diubah');
        }

      }else{
        return redirect('/masukAdmin')->with('gagal','Silahkan Login terlebih dahulu');
      }

    }


    public function tolakPengajuan($id){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token', $token)->count();

      if($tokenDb > 0){
        if(M_Pengajuan::where('id_pengajuan', $id)->update(
          [
            "status" => "0"
          ]
        )){
          
          return redirect('/pengajuan')->with('berhasil', 'Status Pengajuan Berhasil diubah');
        }else{
          return redirect('/pengajuan')->with('gagal', 'Status Pengajuan Gagal diubah');
        }

      }else{
        return redirect('/masukAdmin')->with('gagal','Silahkan Login terlebih dahulu');
      }
    }

    public function riwayatku(){
      $key = env('APP_KEY');
    $token = Session::get('token');
    $tokenDb = M_Suplier::where('token', $token)->count();

    $decode = JWT::decode($token, $key, array('HS256'));
    $decode_array = (array) $decode;


    if($tokenDb > 0){
      $pengajuan = M_Pengajuan::where('id_suplier', $decode_array['id_suplier'])->get();

      $dataArr = array();

      foreach($pengajuan as $p){
        $pengadaan = M_Pengadaan::where('id_pengadaan', $p->id_pengadaan)->first();

        $sup = M_Suplier::where('id_suplier', $decode_array['id_suplier'])->first();

        $lapCount = M_Laporan::where('id_pengajuan', $p->id_pengajuan)->count();

        $lap = M_Laporan::where('id_pengajuan', $p->id_pengajuan)->first();

        if($lapCount > 0){
          $lapLink = $lap->laporan;

        }else{
          $lapLink = "-";

        }

        $dataArr[] = array(
          "id_pengajuan" => $p->id_pengajuan,
          "nama_pengadaan" => $pengadaan->nama_pengadaan,
          "gambar" => $pengadaan->gambar,
          "anggaran" => $pengadaan->anggaran,
          "proposal" => $p->proposal,
          "anggaran_pengajuan" => $p->anggaran,
          "status_pengajuan" => $p->status,
          "nama_suplier" => $sup->nama_usaha,
          "email_suplier" => $sup->email,
          "alamat_suplier" => $sup->alamat,
          "laporan" => $lapLink
        );
      }
      $data['pengajuan'] = $dataArr;
      return view('login_sup.riwayat_pengajuan', $data);

    }else{
      return redirect('/listSuplier')->with('gagal', 'Pengajuan sudah pernah dilakukan');
    }

    }


    public function tambahLaporan(Request $request){

      $key = env('APP_KEY');
      $token = Session::get('token');
      $tokenDb = M_Suplier::where('token', $token)->count();
  
      $decode = JWT::decode($token, $key, array('HS256'));
      $decode_array = (array) $decode;
  
  
      if($tokenDb > 0){
          $this->validate($request,[
              'id_pengajuan' => 'required',
              'laporan'  => 'required|mimes:pdf|max:10000',
              
          ]);
  
          $cekLaporan = M_Laporan::where('id_suplier', $decode_array['id_suplier'])->where('id_pengajuan', $request->id_pengajuan)->count();
  
          if($cekLaporan == 0){
  
            $path = $request->file('laporan')->store('public/laporan');
  
          if(M_Laporan::create([
              "id_pengajuan" => $request->id_pengajuan,
              "id_suplier" => $decode_array['id_suplier'],
              "laporan" => $path,
              
          ])){
              return redirect('/riwayatku')->with('berhasil', 'Laporan berhasil diupload');
  
          }else{
              return redirect('/riwayatku')->with('gagal', 'Laporan gagal diupload');
          }
  
          }else{
            return redirect('/riwayatku')->with('gagal', 'Laporan sudah pernah diupload');
          }
  
      }else{
          return redirect('/masukSuplier')->with('gagal', 'Anda sudah logout, silahkan login kembali');
      }
  
  }

//tag penutup
}
