<?php

namespace App\Http\Controllers;

use App\Models\BobotNilai;
use Illuminate\Http\Request;

class FungsiAjaxController extends Controller
{
    public function load_bobot(Request $request){
        $data = BobotNilai::where('ref_jenis_kegiatan_id',$request->jenis_kegiatan)
                ->when($request->penyelenggara_kegiatan,function($q) use($request) {
                    $q->where('ref_penyelenggara_id',$request->penyelenggara_kegiatan);}) // Penyelenggara

                ->when($request->tingkat_kegiatan,function($q) use ($request){
                    $q->where('ref_tingkat_id',$request->tingkat_kegiatan);}) // Tingkat Kegiatan

                ->when($request->prestasi,function($q) use ($request){
                    $q->where('ref_peran_prestasi_id',$request->prestasi);}) // Prestasi

                ->when($request->peran,function($q) use($request){
                    $q->where('ref_peran_prestasi_id',$request->peran);}) // Peran Prestasi

                ->first();
        if(!$data){
            $data = 0;
        }else{
            $data = $data->bobot;
        }
        return response()->json($data);
    }
}
