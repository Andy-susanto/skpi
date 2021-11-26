<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\KegiatanMahasiswa;
use App\Models\Magang;
use App\Models\PenghargaanKejuaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['utama'] = Magang::where('siakad_mhspt_id', Auth::user()->id)->get();
        return view('magang.index', compact('data'));
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
            'nama'                => 'required|string',
            'ref_bidang_id'       => 'required|integer',
            'ref_divisi_id'       => 'required|integer',
            'tgl_mulai'           => 'required|date',
            'tgl_selesai'         => 'required|date',
            'alamat'              => 'required',
            'kepeg_pegawai_id'    => 'sometimes|integer',
            'bukti_kegiatan'      => 'required|mimes:jpg,png,pdf,docx',
            'judul_laporan_akhir' => 'required'
        ]);

        if ($request->file('bukti_kegiatan')) {
            $filename      = time() . '_' . 'bukti_magang' . '_' . Auth::user()->username . '.' . $request->bukti_kegiatan->getClientOriginalExtension();
            $original_name = $request->bukti_kegiatan->getClientOriginalName();
            $filePath      = $request->file('bukti_kegiatan')->storeAs('uploads', $filename, 'public');

            $files = Files::create([
                'nama'                  => $filename,
                'path'                  => $filePath,
                'siakad_mhspt_id'       => Auth::user()->id,
                'ref_jenis_kegiatan_id' => 6
            ]);
        }

        $magang = Magang::create([
            'nama'                                => $request->nama,
            'ref_bidang_id'                       => $request->ref_bidang_id,
            'ref_divisi_id'                       => $request->ref_divisi_id,
            'kepeg_pegawai_id'                    => $request->dosen_pembimbing,
            'judul_laporan_akhir'                 => $request->judul_laporan_akhir,
            'tugas_utama_magang'                  => $request->tugas_utama_magang,
            'siakad_mhspt_id'                     => Auth::user()->id,
            'tgl_mulai'                           => $request->tgl_mulai,
            'tgl_selesai'                         => $request->tgl_selesai,
            'alamat'                              => $request->alamat,
            'file_kegiatan_id'                    => $files->id_file,
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
        return view('penghargaan-kejuaraan.show', compact('data'));
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
