<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\KegiatanMahasiswa;
use App\Models\KemampuanBahasaAsing;
use App\Models\PenghargaanKejuaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KemampuanBahasaAsingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['utama'] = KemampuanBahasaAsing::where('siakad_mhspt_id', Auth::user()->id)->get();
        return view('kemampuan-bahasa-asing.index', compact('data'));
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
            'nilai_tes'                => 'required',
            'ref_bahasa_id'            => 'required|integer',
            'ref_level_bahasa_id'      => 'required|integer',
            'ref_jenis_tes_id'         => 'required|integer',
            'bukti_kegiatan'           => 'required|mimes:jpg,png,pdf,docx'
        ]);

        if ($request->file('bukti_kegiatan')) {
            $filename      = time() . '_' . 'bukti_kemampuan_bahasa_asing' . '_' . Auth::user()->username . '.' . $request->bukti_kegiatan->getClientOriginalExtension();
            $original_name = $request->bukti_kegiatan->getClientOriginalName();
            $filePath      = $request->file('bukti_kegiatan')->storeAs('uploads', $filename, 'public');

            $files = Files::create([
                'nama'                  => $filename,
                'path'                  => $filePath,
                'siakad_mhspt_id'       => Auth::user()->id,
                'ref_jenis_kegiatan_id' => 8
            ]);
        }

        $magang = KemampuanBahasaAsing::create([
            'nilai_tes'                           => $request->nilai_tes,
            'ref_bahasa_id'                       => $request->ref_bahasa_id,
            'ref_level_bahasa_id'                 => $request->ref_level_bahasa_id,
            'ref_jenis_tes_id'                    => $request->ref_jenis_tes_id,
            'file_kegiatan_id'                    => $files->id_file,
            'siakad_mhspt_id'                     => Auth::user()->id,
            'file_kegiatan_ref_jenis_kegiatan_id' => $files->ref_jenis_kegiatan_id,
        ]);

        toastr()->success('Berhasil Tambah Data');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PenghargaanKejuaraan::findOrFail(decrypt($id));
        return view('penghargaan-kejuaraan.show',compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
