<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class MasterDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pokok'] = Divisi::latest()->get();
        return view('master.divisi.index',compact('data'));
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

         $store = Divisi::create($request->all());

         if ($store) {
             toastr()->success('Berhasil Tambah Data');
             return back();
         }else{
             toastr()->error('Terjadi Kesalahan, Silahkan Coba Lagi');
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
        $data['pokok'] = Divisi::find(decrypt($id));
        $view = view('master.divisi.edit',compact('data'))->render();
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

        $update = Divisi::where('id_ref_divisi',decrypt($id))->update($request->except(['_token','_method']));
        if ($update) {
            # code..
            toastr()->success('Berhasil Update Data');
            return back();
        }else{
            toastr()->error('Terjadi Kesalahan, Silahkan Coba Lagi');
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
        $destroy = Divisi::where('id_ref_divisi',decrypt($id))->delete();
        if ($destroy) {
            toastr()->success('Berhasil Hapus data');
        }else{
            toastr()->error('Terjadi Kesalahan, Silahkan Coba lagi');
        }
        return back();
    }
}
