<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\KaryaMahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\KegiatanMahasiswa;
use App\Models\KemampuanBahasaAsing;
use App\Models\Kewirausahaan;
use App\Models\Magang;
use App\Models\Organisasi;
use App\Models\PenerimaHibah;
use App\Models\PengabdianMasyarakat;
use App\Models\PenghargaanKejuaraan;
use App\Models\SeminarPelatihan;
use Illuminate\Support\Facades\Auth;

class ValidasiRekamKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = collect();
            if ($request->id_jenis_kegiatan == 1 || $request->id_jenis_kegiatan == '') {
                $penghargaan = PenghargaanKejuaraan::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $penghargaanMap = $penghargaan->map(function($item){
                    return [
                        'id'             => $item->id_penghargaan_kejuaraan_kompetensi,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'penghargaan',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($penghargaanMap);
            }

            if ($request->id_jenis_kegiatan == 2 || $request->id_jenis_kegiatan == '') {
                $seminar = SeminarPelatihan::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $seminarMap = $seminar->map(function($item){
                    return [
                        'id'             => $item->id_seminar_pelatihan_workshop_diklat,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'seminar',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($seminarMap);
            }

            if ($request->id_jenis_kegiatan == 3 || $request->id_jenis_kegiatan == '') {
                $penerimaHibah = PenerimaHibah::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $penerimaHibahMap = $penerimaHibah->map(function($item){
                    return [
                        'id'             => $item->id_penerima_hibah_pendanaan,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'hibah',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });
                $data = $data->merge($penerimaHibahMap);

            }

            if ($request->id_jenis_kegiatan == 4 || $request->id_jenis_kegiatan == '') {
                $pengabdianMasyarakat = PengabdianMasyarakat::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $pengabdianMasyarakatMap = $pengabdianMasyarakat->map(function($item){
                    return [
                        'id'             => $item->id_pengabdian_masyarakat,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'pengabdian',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($pengabdianMasyarakatMap);
            }

            if ($request->id_jenis_kegiatan == 5 || $request->id_jenis_kegiatan == '') {
                $organisasi = Organisasi::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $organisasiMap = $organisasi->map(function($item){
                    return [
                        'id'             => $item->id_organisasi,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'organisasi',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($organisasiMap);
            }
            if ($request->id_jenis_kegiatan == 6 || $request->id_jenis_kegiatan == '') {
                $magang = Magang::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $magangMap = $magang->map(function($item){
                    return [
                        'id'             => $item->id_magang,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'magang',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($magangMap);
            }

            if ($request->id_jenis_kegiatan == 7 || $request->id_jenis_kegiatan == '') {
                $beasiswa = Beasiswa::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $beasiswaMap = $beasiswa->map(function($item){
                    return [
                        'id'             => $item->id_beasiswa,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'beasiswa',
                        'nama_kegiatan'  => $item->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($beasiswaMap);
            }

            if ($request->id_jenis_kegiatan == 8 || $request->id_jenis_kegiatan == '') {
                $bahasa = KemampuanBahasaAsing::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $bahasaMap = $bahasa->map(function($item){
                    return [
                        'id'             => $item->id_kemampuan_bahasa_asing,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'bahasa',
                        'nama_kegiatan'  => $item->bahasa->nama,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($bahasaMap);
            }

            if ($request->id_jenis_kegiatan == 9 || $request->id_jenis_kegiatan == '') {
                $kewirausahaan = Kewirausahaan::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $kewirausahaanMap = $kewirausahaan->map(function($item){
                    return [
                        'id'             => $item->id_kewirausahaan,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'kewirausahaan',
                        'nama_kegiatan'  => $item->nama_usaha,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($kewirausahaanMap);
            }

            if ($request->id_jenis_kegiatan == 10 || $request->id_jenis_kegiatan == '') {
                $karyaMahasiswa = KaryaMahasiswa::whereHas('mhspt',function($qp){
                    $qp->FilterUnit();
                })->when($request->status_validasi,function($q)use($request){
                    $q->where('status_validasi',$request->status_validasi);
                })->orderBy('status_validasi','asc')->get();

                $karyaMahasiswaMap = $karyaMahasiswa->map(function($item){
                    return [
                        'id'             => $item->id_karya_mahasiswa,
                        'nama_mahasiswa' => $item->mhspt->mahasiswa->nama_mahasiswa,
                        'nim'            => $item->mhspt->no_mhs,
                        'prodi'          => $item->mhspt->prodi->nama_prodi,
                        'jenis_kegiatan' => 'karya',
                        'nama_kegiatan'  => $item->judul_hasil_karya,
                        'path'           => $item->files->path,
                        'validasi'       => $item->status_validasi,
                    ];
                });

                $data = $data->merge($karyaMahasiswaMap);
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn("nama_mahasiswa",function($row){
                        return $row['nama_mahasiswa'];
                    })
                    ->addColumn("nim",function($row){
                        return $row['nim'];
                    })
                    ->addColumn("program_studi",function($row){
                        return $row['prodi'];
                    })
                    ->addColumn("jenis_kegiatan",function($row){
                        if ($row['jenis_kegiatan'] == 'penghargaan') {
                            return 'Penghargaan Kejuaraan';
                        }elseif ($row['jenis_kegiatan'] == 'seminar') {
                            return 'Seminar Pelatihan';
                        }elseif ($row['jenis_kegiatan'] == 'hibah') {
                            return 'Penerima Hibah';
                        }elseif ($row['jenis_kegiatan'] == 'pengabdian') {
                            return 'Pengabdian Masyarakat';
                        }elseif ($row['jenis_kegiatan'] == 'organisasi') {
                            return 'Organisasi';
                        }elseif ($row['jenis_kegiatan'] == 'magang') {
                            return 'Magang';
                        }elseif ($row['jenis_kegiatan'] == 'beasiswa') {
                            return 'Beasiswa';
                        }elseif ($row['jenis_kegiatan'] == 'bahasa') {
                            return 'Kemampuan Bahasa Asing';
                        }elseif ($row['jenis_kegiatan'] == 'kewirausahaan') {
                            return 'Kewirausahaan';
                        }elseif ($row['jenis_kegiatan'] == 'karya') {
                            return 'Karya Mahasiswa';
                        }
                    })
                    ->addColumn("nama_kegiatan",function($row){
                        return $row['nama_kegiatan'];
                    })
                    ->addColumn("bukti_kegiatan",function($row){
                        return view('validasi-rekam-kegiatan.file',compact('row'));
                    })
                    ->addColumn("validasi",function($row){
                        return view('validasi-rekam-kegiatan.status',compact('row'));
                    })
                    ->addColumn("action",function($row){
                        return view('validasi-rekam-kegiatan.aksi',compact('row'));
                    })
                    ->rawColumns(['action','nama_mahasiswa','nim','program_studi','jenis_kegiatan','nama_kegiatan','bukti_kegiatan'])
                    ->make(true);
                }
        return view('validasi-rekam-kegiatan.index');
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
    public function update(Request $request,$type, $id)
    {

        if($type == 'penghargaan'){
            PenghargaanKejuaraan::where('id_penghargaan_kejuaraan_kompetensi',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'seminar'){
            SeminarPelatihan::where('id_seminar_pelatihan_workshop_diklat',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'hibah'){
            PenerimaHibah::where('id_penerima_hibah_pendanaan',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'pengabdian'){
            PengabdianMasyarakat::where('id_pengabdian_masyarakat',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'organisasi'){
            Organisasi::where('id_organisasi',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'magang'){
            Magang::where('id_magang',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'beasiswa'){
            Beasiswa::where('id_beasiswa',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'bahasa'){
            KemampuanBahasaAsing::where('id_kemampuan_bahasa_asing',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'kewirausahaan'){
            Kewirausahaan::where('id_kewirausahaan',$id)->update([
                'status_validasi' => '1'
            ]);
        }else if($type == 'karya'){
            KaryaMahasiswa::where('id_karya_mahasiswa',$id)->update([
                'status_validasi' => '1'
            ]);
        }
        toastr()->success('Berhasil menvalidasi data');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type,$id)
    {
        if($type == 'penghargaan'){
            PenghargaanKejuaraan::where('id_penghargaan_kejuaraan_kompetensi',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'seminar'){
            SeminarPelatihan::where('id_seminar_pelatihan_workshop_diklat',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'hibah'){
            PenerimaHibah::where('id_penerima_hibah_pendanaan',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'pengabdian'){
            PengabdianMasyarakat::where('id_pengabdian_masyarakat',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'organisasi'){
            Organisasi::where('id_organisasi',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'magang'){
            Magang::where('id_magang',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'beasiswa'){
            Beasiswa::where('id_beasiswa',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'bahasa'){
            KemampuanBahasaAsing::where('id_kemampuan_bahasa_asing',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'kewirausahaan'){
            Kewirausahaan::where('id_kewirausahaan',$id)->update([
                'status_validasi' => '2'
            ]);
        }else if($type == 'karya'){
            KaryaMahasiswa::where('id_karya_mahasiswa',$id)->update([
                'status_validasi' => '2'
            ]);
        }

        toastr()->success('Berhasil menvalidasi data');
        return back();
    }
}
