<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Tingkat;
use App\Models\Prestasi;
use App\Models\BobotNilai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Penyelenggara;
use App\Models\KegiatanMahasiswa;
use App\Models\PenghargaanKejuaraan;
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
        $data['utama']            = PenghargaanKejuaraan::where('siakad_mhspt_id',Auth::user()->id)->get();
        return view('penghargaan-kejuaraan.index',compact('data'));
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
            $filename      = time().'_'.'bukti_kegiatan_penghargaan_kejuaraan'.'_'.Auth::user()->username.'.'.$request->bukti_kegiatan->getClientOriginalExtension();
            $original_name = $request->bukti_kegiatan->getClientOriginalName();
            $filePath      = $request->file('bukti_kegiatan')->storeAs('uploads',$filename,'public');

            $files = Files::create([
                'nama'                  => $filename,
                'path'                  => $filePath,
                'siakad_mhspt_id'       => Auth::user()->id,
                'ref_jenis_kegiatan_id' => 1
            ]);

        }

        $bobot_nilai = BobotNilai::where('ref_jenis_kegiatan_id',1)
                    ->when($request->penyelenggara_kegiatan,function($q) use($request) {
                        $q->where('ref_penyelenggara_id',$request->penyelenggara_kegiatan);})
                    ->when($request->tingkat_kegiatan,function($q) use ($request){
                        $q->where('ref_tingkat_id',$request->tingkat_kegiatan);})
                    ->when($request->prestasi,function($q) use ($request){
                        $q->where('ref_peran_prestasi_id',$request->prestasi);})
                    ->first();


        $penghargaan = PenghargaanKejuaraan::create([
            'nama'                                => $request->nama_kegiatan,
            'ref_penyelenggara_id'                => $request->penyelenggara_kegiatan,
            'ref_tingkat_id'                      => $request->tingkat_kegiatan,
            'ref_peran_prestasi_id'               => $request->prestasi,
            'kepeg_pegawai_id'                    => $request->dosen_pembimbing,
            'siakad_mhspt_id'                     => Auth::user()->id,
            'tgl_mulai'                           => $request->tanggal_mulai_kegiatan,
            'tgl_selesai'                         => $request->tanggal_selesai_kegiatan,
            'bobot_nilai_id'                      => $bobot_nilai->id_bobot_nilai,
            'file_kegiatan_id'                    => $files->id_file,
            'file_kegiatan_ref_jenis_kegiatan_id' => $files->ref_jenis_kegiatan_id,
            'status_validasi' => '0'
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
        $data['utama'] = PenghargaanKejuaraan::findOrFail(decrypt($id));
        return view('penghargaan-kejuaraan.edit',compact('data'));
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
