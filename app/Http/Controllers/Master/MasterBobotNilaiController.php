<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\BobotNilai;
use Illuminate\Http\Request;

class MasterBobotNilaiController extends Controller
{
    public function index(){
        $data['bobot'] = BobotNilai::latest()->get();
        return view('master.bobot-nilai.index',compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'ref_jenis_kegiatan_id' => 'required',
            'ref_penyelenggara_id'  => 'required',
            'ref_tingkat_id'        => 'required',
            'ref_peran_prestasi_id' => 'required',
            'ref_kategori_id'       => 'required'
        ]);

        $store = BobotNilai::create($request->all());

        if ($store) {
            toastr()->success('Berhasil Tambah Data');
            return back();
        }else{
            toastr()->error('Tejadi Kesalahan, Silahkan Coba Lagi');
            return back();
        }
    }

    public function edit($id){
        $data['bobot'] = BobotNilai::find(decrypt($id));
        $view = view('master.bobot-nilai.edit',compact('data'))->render();
        return $view;
    }

    public function update(Request $request,$id){
        $request->validate([
            'ref_jenis_kegiatan_id' => 'required',
            'ref_penyelenggara_id'  => 'required',
            'ref_tingkat_id'        => 'required',
            'ref_peran_prestasi_id' => 'required',
            'ref_kategori_id'       => 'required'
        ]);

        $update = BobotNilai::where('id_bobot_nilai',decrypt($id))->update($request->except(['_token','_method']));
        if ($update) {
            toastr()->success('Berhasil Update Data');
            return back();
        }else{
            toastr()->error('Tejadi Kesalahan, Silahkan Coba Lagi');
        }
    }

    public function destroy($id){
        $destroy = BobotNilai::where('id_bobot_nilai',decrypt($id))->delete();
        if ($destroy) {
            toastr()->success('Berhasil Hapus Data');
            return back();
        }else{
            toastr()->error('Tejadi Kesalahan, Silahkan Coba Lagi');
            return back();
        }
    }
}
