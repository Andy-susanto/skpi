<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoadDataController extends Controller
{
    public function loadDosenPegawai(Request $request)
    {
      $datas=DB::table('kepeg.users as a')
        ->join('kepeg.pegawai as b','a.id','=','b.user_id')
        ->whereIn('b.status_keaktifan_pegawai_id',[1,2,3,4])
        ->where(function($q)use($request){
          $q->orWhere('a.nip','like','%'.$request->search.'%')
          ->where('a.username','like','%'.$request->search.'%')
          ->orWhere('b.nama_pegawai','like','%'.$request->search.'%');
        })
        ->take(50)->get();
        $json=[];
        if ($datas) {

          foreach ($datas as $data) {

             $json[] = ['id'=>$data->id_pegawai, 'text'=>$data->nip." - ".$data->gelar_depan." ".ucwords(strtolower($data->nama_pegawai)).", ".$data->gelar_belakang ];


          }
        }
      return response()->json($json);
    }

    public function loadDosen(Request $request){
        $datas=DB::table('kepeg.users as a')
        ->join('kepeg.pegawai as b','a.id','=','b.user_id')
        ->whereIn('b.status_keaktifan_pegawai_id',[1,2,3,4])
        ->where('b.status_kerja_id',2)
        ->where(function($q)use($request){
          $q->orWhere('a.nip','like','%'.$request->search.'%')
          ->where('a.username','like','%'.$request->search.'%')
          ->orWhere('b.nama_pegawai','like','%'.$request->search.'%');
        })
        ->take(50)->get();
        $json=[];
        if ($datas) {

          foreach ($datas as $data) {

             $json[] = ['id'=>$data->id_pegawai, 'text'=>$data->nip." - ".$data->gelar_depan." ".ucwords(strtolower($data->nama_pegawai)).", ".$data->gelar_belakang ];


          }
        }
      return response()->json($json);
    }
}
