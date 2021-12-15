<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Helper\Helpers;
use App\Helper\Tanggal;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read-user');
        if ($request->ajax()) {
            $user = User::join('kepeg.pegawai as a', 'a.nip', '=', 'users.nip')
                ->select('users.*', 'a.nama_pegawai');
            return DataTables::of($user)
                ->addColumn('action', function ($q) {
                    return view('user.action', compact('q'));
                })
                ->addColumn('created_at', function ($q) {
                    return Tanggal::time_indo($q->created_at);
                })
                ->addColumn('nama_gelar', function ($q) {
                    if ($q->kepeg_pegawai()->exists()) {
                        return Helpers::nama_gelar($q->kepeg_pegawai);
                    } else {
                        return $q->username;
                    }
                })

                ->addColumn('roles', function (User $user) {
                    return $user->roles->map(function ($roles) {
                        return "- " . $roles->nama_role;
                    })->implode('<br>');
                })
                ->addColumn('level_akun', function ($a) {
                    if ($a->level_akun == '0') {
                        $level = "Universitas (All prodi)";
                    } else {
                        $level = "Per unit kerja";
                        $level .= "<ul>";
                        foreach ($a->instansi as $instansi) {
                            $level .= "<li>" . '(' . $instansi->parent_unit_utama->ref_unit->singkatan_unit . ') ' . $instansi->ref_unit->nama_ref_unit_kerja_lengkap . '</li>';
                        }
                        $level .= "</ul>";
                    }
                    return $level;
                })

                ->addIndexColumn()
                ->escapeColumns('action', 'roles')->make(true);
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $unitKerja = UnitKerja::with('ref_unit', 'parent_unit', 'parent_unit_utama')->get();
        return view('user.create', compact('roles', 'unitKerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peg = DB::table('kepeg.pegawai as a')
            ->join('kepeg.dosen as b', 'a.id_pegawai', '=', 'b.pegawai_id')
            ->join('kepeg.users as c', 'c.id', '=', 'a.user_id')
            ->where('a.id_pegawai', $request->id_pegawai)
            ->first();
        $cek = User::where('id', $peg->id_pegawai)->first();
        if (!$cek) {
            $cek = new User();
            $cek->id = $peg->id_pegawai;
            $cek->username = $peg->username;
            $cek->nip = $peg->nip;
            $cek->save();
        }
        $cek->roles()->sync($request->roles);
        $cek->instansi()->sync($request->id_unit_kerja);

        toastr()->success('User Berhasil di tambahkan');
        return redirect()->route('user.index');
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
        $user = User::findOrFail($id);
        $user_roles = [];
        $roles = Role::all();
        $user_roles = [];
        $user_instansi = [];
        $unitKerja = UnitKerja::with('ref_unit', 'parent_unit', 'parent_unit_utama')->get();
        foreach ($user->roles as $role) {
            $user_roles[] = $role->id_role;
        }


        foreach ($user->instansi as $instansi) {
            $user_instansi[] = $instansi->id_unit_kerja;
        }
        return view('user.edit', compact('user_roles', 'user', 'roles', 'user_instansi', 'unitKerja'));
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
        $user = User::where('id', $id);
        $rolesupdate = $user->first()->roles()->sync($request->roles);
        $instansiupdate = $user->first()->instansi()->sync($request->id_unit_kerja);
        toastr()->success('Berhasil update data');
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
        //
    }

    public function cari_user(Request $request)
    {
        if ($request->ajax()) {
            $user = DB::table('siakad.users');
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    return '<a name="" id="" class="btn btn-info btn-sm" href="'.route('login-as',encrypt($row->id)).'" role="button">Login As</a>';
                })
                ->escapeColumns('aksi')
                ->toJson();
        }
    }

    public function login_as($id)
    {
        $cek = DB::table('siakad.users')->where('id',decrypt($id))->first();
        if ($cek) {
            session(['kamuflase' => $cek->username]);
            toastr()->success('Berhasil melakukan login as');
            return redirect('home');
        } else {
            return back();
        }
    }

    public function logout_as($id){
        $cek = User::find(decrypt($id));
        if ($cek) {
            Session()->forget('kamuflase');
            toastr()->success('Kembali Ke Akun Utama');
            return redirect()->route('user.index');
        }else{
            return back();
        }
    }
}
