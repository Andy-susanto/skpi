<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\LevelPenguasaan;
use Illuminate\Http\Request;

class MasterLevelBahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pokok'] = LevelPenguasaan::latest()->get();
        return view('master.level-bahasa.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $store = LevelPenguasaan::create($request->all());

        if ($store) {
            toastr()->success('Berhasil Tambah Data');
            return back();
        }else{
            toastr()->error('Terjadi Kesalahan,Silahkan Coba Lagi');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pokok'] = LevelPenguasaan::find(decrypt($id));
        $view = view('master.bidang.edit',compact('data'))->render();
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $update = LevelPenguasaan::where('id_ref_level_bahasa',decrypt($id))->update($request->except(['_token','_method']));
        if ($update) {
           toastr()->success('Berhasil Update Data');
           return back();
        }else{
            toastr()->error('Terjadi Kesalahan , Silahkan Coba lagi');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = LevelPenguasaan::where('id_ref_level_bahasa',decrypt($id))->delete();
        if ($destroy) {
            toastr()->success('Berhasil Hapus data');
        }else{
            toastr()->error('Terjadi Kesalahan, Silahkan Coba lagi');
        }
        return back();
    }
}
