<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read-role');
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('parent_id', 0)->get();
        return view('role.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->only('nama_role', 'keterangan_role'));
        $role->menus()->attach($request->menu_id);
        $role->permissions()->attach($request->permission_id);
        toastr()->success('Berhasil Tambah Role');
        return redirect()->route('roles.index');
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
        $role = Role::findOrFail($id);
        $role_menus = [];
        $role_permissions = [];
        $menus = Menu::where('parent_id', 0)->get();
        foreach ($role->menus as $menu) {
            $role_menus[] = $menu->id_menu;
        }
        foreach ($role->permissions as $permission) {
            $role_permissions[] = $permission->id_permission;
        }
        return view('role.edit', compact('role_menus', 'role_permissions', 'role', 'menus'));
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
        $role=Role::where('id_role',$id);
        $update=$role->update($request->only('nama_role','keterangan_role'));
        $role->first()->menus()->sync($request->menu_id);
        $role->first()->permissions()->sync($request->permission_id);
        toastr()->success('Berhasil memperbaharui data');
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
        Role::find($id)->delete();
        toastr()->success('Berhasil hapus data');
        return back();
    }
}
