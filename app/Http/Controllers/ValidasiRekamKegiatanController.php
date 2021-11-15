<?php

namespace App\Http\Controllers;

use App\Models\JenisKegiatan;
use App\Models\KegiatanMahasiswa;
use App\Models\PenghargaanKejuaraan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ValidasiRekamKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis_kegiatan    = JenisKegiatan::get();
        // if($request->ajax()){
        //     $data = PenghargaanKejuaraan::when($request->id_jenis_kegiatan,function($q)use($request){
        //         $q->where('jenis_kegiatan_id',$request->id_jenis_kegiatan);
        //     })
        //     ->when($request->status_kegiatan,function($q)use($request){
        //         $q->where('validasi',$request->status_kegiatan);
        //     })->orderBy('validasi','asc')->get();

        //     return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn("nama_mahasiswa",function($row){
        //                 return $row->mhspt->mahasiswa->nama_mahasiswa;
        //             })
        //             ->addColumn("nim",function($row){
        //                 return $row->mhspt->no_mhs;
        //             })
        //             ->addColumn("program_studi",function($row){
        //                 return $row->mhspt->prodi->nama_prodi;
        //             })
        //             ->addColumn("jenis_kegiatan",function($row){
        //                 return $row->jenis_kegiatan->nama_kegiatan;
        //             })
        //             ->addColumn("nama_kegiatan",function($row){
        //                 return $row->kegiatan()->nama_kegiatan;
        //             })
        //             ->addColumn("bukti_kegiatan",function($row){
        //                 return view('validasi-rekam-kegiatan.file',compact('row'));
        //             })
        //             ->addColumn("validasi",function($row){
        //                 return view('validasi-rekam-kegiatan.status',compact('row'));
        //             })
        //             ->addColumn("action",function($row){
        //                 return view('validasi-rekam-kegiatan.aksi',compact('row'));
        //             })
        //             ->rawColumns(['action','nama_mahasiswa','nim','program_studi','jenis_kegiatan','nama_kegiatan','bukti_kegiatan'])
        //             ->make(true);
        // }
        return view('validasi-rekam-kegiatan.index',compact('jenis_kegiatan'));
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
        //
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
        //
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
        KegiatanMahasiswa::where('id_kegiatan_mahasiswa',$id)->update([
            'validasi' => '2'
        ]);

        toastr()->success('Berhasil menvalidasi data');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KegiatanMahasiswa::where('id_kegiatan_mahasiswa',$id)->update([
            'validasi' => '3'
        ]);
        toastr()->success('Berhasil menvalidasi data');
        return back();
    }
}
