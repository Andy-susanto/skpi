<?php

namespace App\Http\Controllers;

use App\Models\BobotNilai;
use Illuminate\Http\Request;

class FungsiAjaxController extends Controller
{
    public function load_bobot(Request $request){
        $data = BobotNilai::where('jenis_kegiatan_id',$request->jenis_kegiatan)->when($request->penyelenggara_kegiatan,function($q) use($request) {
            $q->where('penyelenggara_kategori_id',$request->penyelenggara_kegiatan);
        })->when($request->tingkat_kegiatan,function($q) use ($request){
            $q->where('tingkat_id',$request->tingkat_kegiatan);
        })->when($request->prestasi,function($q) use ($request){
            $q->where('prestasi_id',$request->prestasi);
        })->first();

        if(!$data){
            $data = 0;
        }
        return response()->json($data->bobot);
    }
}
