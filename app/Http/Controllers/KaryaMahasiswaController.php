<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\KaryaMahasiswa;
use App\Models\KegiatanMahasiswa;
use App\Models\PenghargaanKejuaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['utama'] = KaryaMahasiswa::where('siakad_mhspt_id', Auth::user()->id)->get();
        return view('karya-mahasiswa.index', compact('data'));
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
            'judul_hasil_karya' => 'required',
            'no_hki'            => 'required',
            'ref_kategori_id'   => 'required',
            'ref_jenis_id'      => 'required',
            'bukti_kegiatan'    => 'required|mimes:jpg,png,pdf,docx'
        ]);

        if ($request->file('bukti_kegiatan')) {
            $filename      = time() . '_' . 'bukti_karya_mahasiswa' . '_' . Auth::user()->username . '.' . $request->bukti_kegiatan->getClientOriginalExtension();
            $original_name = $request->bukti_kegiatan->getClientOriginalName();
            $filePath      = $request->file('bukti_kegiatan')->storeAs('uploads', $filename, 'public');

            $files = Files::create([
                'nama'                  => $filename,
                'path'                  => $filePath,
                'siakad_mhspt_id'       => Auth::user()->id,
                'ref_jenis_kegiatan_id' => 10
            ]);
        }

        $karyaMahasiswa = KaryaMahasiswa::create([
            'siakad_mhspt_id'                     => Auth::user()->id,
            'judul_hasil_karya'                   => $request->judul_hasil_karya,
            'no_hki'                              => $request->no_hki,
            'ref_kategori_id'                     => $request->ref_kategori_id,
            'ref_jenis_id'                        => $request->ref_jenis_id,
            'file_kegiatan_id'                    => $files->id_file,
            'file_kegiatan_ref_jenis_kegiatan_id' => $files->ref_jenis_kegiatan_id
        ]);

        if ($karyaMahasiswa) {
            toastr()->success('Berhasil Tambah Data');
        }else{
            toastr()->error('Terjadi Kesalahan, Silahkan Coba Lagi');
        }
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
        $data = KaryaMahasiswa::findOrFail(decrypt($id));
        return view('karya-mahasiswa.show',compact('data'));
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
