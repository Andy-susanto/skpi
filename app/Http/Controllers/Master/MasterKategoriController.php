<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MasterKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pokok'] = Kategori::has('jenis_kegiatan')->latest()->get();
        return view('master.kategori.index',compact([
            'data'
        ]));
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
            'nama_kategori'   => 'required'
        ]);

        $store = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        if ($store) {
            $jenis_kegiatan = $request->ref_jenis_kegiatan_id;
            foreach ($jenis_kegiatan as $key => $dataJenisKegiatan) {
                $store->jenis_kegiatan()->sync($dataJenisKegiatan);
            }
            toastr()->success('Berhasil Tambah Data');
            return back();
        }else{
            toastr()->error('Terjadi Kesalahan');
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
        $data['pokok']          = Kategori::find(decrypt($id));
        $data['jenis_kegiatan'] = $data['pokok']->jenis_kegiatan->pluck('id_ref_jenis_kegiatan')->toArray();
        $view                   = view('master.kategori.edit',compact('data'))->render();
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
            'nama_kategori'   => 'required'
        ]);

        $update = Kategori::where('id_ref_kategori',decrypt($id))->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        if ($update) {
            $find = Kategori::findOrFail(decrypt($id));
            $find->jenis_kegiatan()->sync($request->ref_jenis_kegiatan_id);

            toastr()->success('Berhasil Update Data');
            return back();
        }else{
            toastr()->error('Terjadi Kesalahan');
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
        $find          = Kategori::findOrFail(decrypt($id));
        $jenisKegiatan = $find->jenis_kegiatan->pluck('id_ref_jenis_kegiatan')->toArray();
        $find->jenis_kegiatan()->detach($jenisKegiatan);
        $destroy = Kategori::where('id_ref_kategori',decrypt($id))->delete();
        if($destroy){
            toastr()->success('Berhasil Hapus Data');
            return back();
        }else{
            toastr()->error('Terjadi Kesalahan, Silahkan Coba Lagi');
            return back();
        }
    }
}
