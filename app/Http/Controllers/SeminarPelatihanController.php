<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Tingkat;
use App\Models\Prestasi;
use App\Models\BobotNilai;
use Illuminate\Http\Request;
use App\Models\Penyelenggara;
use App\Models\SeminarPelatihan;
use App\Models\KegiatanMahasiswa;
use App\Models\PenghargaanKejuaraan;
use Illuminate\Support\Facades\Auth;

class SeminarPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
            $seminar         = SeminarPelatihan::all();
        $data['penyelenggara'] = Penyelenggara::has('jenis_kegiatan')->get();
        $data['tingkat']       = Tingkat::has('jenis_kegiatan')->get();
        $data['peran']         = Prestasi::has('jenis_kegiatan')->get();
        return view('seminar-pelatihan.index',compact('seminar','data'));
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
            'peran'                    => 'required|integer',
            'dosen_pembimbing'         => 'nullable|integer',
            'bukti_kegiatan'           => 'required|mimes:jpg,png,pdf,docx'
        ],[
            'nama_kegiatan.required'            => 'Nama Kegiatan Harus di isi',
            'nama_kegiatan.string'              => 'Nama Kegiatan Harus berbentuk text',
            'tingkat_kegiatan.required'         => 'Tingkat Kegiatan Harus di isi',
            'tingkat_kegiatan.integer'          => 'Tingkat Kegiatan Salah',
            'tanggal_mulai_kegiatan.required'   => 'Tanggal Mulai Kegiatan Harus di isi',
            'tanggal_mulai_kegiatan.date'       => 'Format Tanggal Salah',
            'tanggal_selesai_kegiatan.required' => 'Tanggal Selesai Kegiatan Harus di isi',
            'tanggal_selesai_kegiatan.date'     => 'Format Tanggal Salah',
            'peran.required'                    => 'Peran Harus di isi',
            'peran.integer'                     => 'Format Peran Salah',
            'dosen_pembimbing.integer'          => 'Format Data Dosen Salah',
            'bukti_kegiatan.required'           => 'Bukti Kegiatan Harus di isi',
            'bukti_kegiatan.mimes'              => 'Format File tidak mendukung'
        ]);

        if($request->file('bukti_kegiatan')){
            $filename      = time().'_'.'bukti_kegiatan_seminar_pelatihan'.'_'.Auth::user()->username.'.'.$request->bukti_kegiatan->getClientOriginalExtension();
            $original_name = $request->bukti_kegiatan->getClientOriginalName();
            $filePath      = $request->file('bukti_kegiatan')->storeAs('uploads',$filename,'public');

            $files = Files::create([
                'nama_file'     => $filename,
                'jenis'         => 'bukti kegiatan seminar pelatihan',
                'original_name' => $original_name,
                'path'          => $filePath,
                'id_user'       => Auth::user()->id
            ]);

        }

        $bobot_nilai = BobotNilai::where('jenis_kegiatan_id',1)
                    ->when($request->penyelenggara_kegiatan,function($q) use($request) {
                            $q->where('penyelenggara_kategori_id',$request->penyelenggara_kegiatan);})

                    ->when($request->tingkat_kegiatan,function($q) use ($request){
                            $q->where('tingkat_id',$request->tingkat_kegiatan);})

                    ->when($request->prestasi,function($q) use ($request){
                            $q->where('prestasi_peran_id',$request->prestasi);})

                    ->first();

        $seminar = SeminarPelatihan::create([
            'nama_kegiatan'       => $request->nama_kegiatan,
            'penyelenggara_id'    => $request->penyelenggara_kegiatan,
            'tingkat_id'          => $request->tingkat_kegiatan,
            'dosen_pembimbing_id' => $request->dosen_pembimbing,
            'peran_id'            => $request->peran,
        ]);

        KegiatanMahasiswa::create([
            'id_mhs_pt'         => Auth::user()->id,
            'validasi'          => 1,
            'tanggal_mulai'     => $request->tanggal_mulai_kegiatan,
            'tanggal_selesai'   => $request->tanggal_selesai_kegiatan,
            'file_id'           => $files->id_file ?? 0,
            'pegawai_id'        => $request->dosen_pembimbing,
            'detail_id'         => $seminar->id_seminar_pelatihan,
            'jenis_kegiatan_id' => 2,
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
        $data = SeminarPelatihan::findOrFail(decrypt($id));
        return view('seminar-pelatihan.show',compact('data'));
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
