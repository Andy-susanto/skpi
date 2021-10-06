<?php

namespace App\Http\Controllers;

use App\Models\BobotNilai;
use App\Models\Files;
use App\Models\KegiatanMahasiswa;
use App\Models\PenghargaanKejuaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenghargaanKejuaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghargaan = PenghargaanKejuaraan::with(['kegiatan_mahasiswa','kegiatan_mahasiswa.kepeg_pegawai'])->get();
        return view('penghargaan-kejuaraan.index',compact('penghargaan'));
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
            'nama_kegiatan'            => 'required|string',
            'penyelenggara_kegiatan'   => 'required|integer',
            'tingkat_kegiatan'         => 'required|integer',
            'tanggal_mulai_kegiatan'   => 'required|date',
            'tanggal_selesai_kegiatan' => 'required|date',
            'prestasi'                 => 'required|integer',
            'dosen_pembimbing'         => 'nullable|integer',
            'bukti_kegiatan'           =>  'required|mimes:jpg,png,pdf,docx'
        ]);


        if($request->file('bukti_kegiatan')){
            $filename = time().'_'.'bukti_kegiatan_penghargaan_kejuaraan'.'_'.Auth::user()->username.'.'.$request->bukti_kegiatan->getClientOriginalExtension();
            $original_name = $request->bukti_kegiatan->getClientOriginalName();
            $filePath = $request->file('bukti_kegiatan')->storeAs('uploads',$filename,'public');

            $files = Files::create([
                'nama_file'     => $filename,
                'jenis'         => 'bukti kegiatan penghargaaan kejuaraan',
                'original_name' => $original_name,
                'path'          => $filePath,
                'id_user'       => Auth::user()->id
            ]);

        }

        $bobot_nilai = BobotNilai::where('jenis_kegiatan_id',1)->when($request->penyelenggara_kegiatan,function($q) use($request) {
            $q->where('penyelenggara_kategori_id',$request->penyelenggara_kegiatan);
        })->when($request->tingkat_kegiatan,function($q) use ($request){
            $q->where('tingkat_id',$request->tingkat_kegiatan);
        })->when($request->prestasi,function($q) use ($request){
            $q->where('prestasi_id',$request->prestasi);
        })->first();

        $penghargaan = PenghargaanKejuaraan::create([
            'nama_kegiatan'       => $request->nama_kegiatan,
            'penyelenggara_id'    => $request->penyelenggara_kegiatan,
            'tingkat_id'          => $request->tingkat_kegiatan,
            'prestasi_id'         => $request->prestasi,
            'dosen_pembimbing_id' => $request->dosen_pembimbing,
        ]);

        KegiatanMahasiswa::create([
            'id_mhs_pt'         => Auth::user()->id,
            'validasi'          => 1,
            'tanggal_mulai'     => $request->tanggal_mulai_kegiatan,
            'tanggal_selesai'   => $request->tanggal_selesai_kegiatan,
            'file_id'           => $files->id_file ?? 0,
            'pegawai_id'        => $request->dosen_pembimbing,
            'detail_id'         => $penghargaan->id_penghargaan_kejuaraan,
            'jenis_kegiatan_id' => 1,
            'bobot_nilai_id'    => $bobot_nilai->bobot_nilai_id ?? 0
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
