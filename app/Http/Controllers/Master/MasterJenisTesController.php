<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\JenisTes;
use Illuminate\Http\Request;

class MasterJenisTesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pokok'] = JenisTes::latest()->get();
        return view('master.jenis-tes.index',compact('data'));
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

        $store = JenisTes::create($request->all());

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
        $data['pokok'] = JenisTes::findOrFail(decrypt($id));
        $view = view('master.jenis-tes.edit',compact('data'))->render();
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

        $update = JenisTes::where('id_ref_jenis_tes',decrypt($id))->update($request->except(['_token','_method']));
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
        $destroy = JenisTes::where('id_ref_jenis_tes',decrypt($id))->delete();
        if ($destroy) {
            toastr()->success('Berhasil Hapus data');
        }else{
            toastr()->error('Terjadi Kesalahan, Silahkan Coba lagi');
        }
        return back();
    }
}
