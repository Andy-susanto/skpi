<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    public function index()
    {
        $this->authorize('read-menu');
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function store(Request $request)
    {
        Menu::create($request->all());
        toastr()->success('Berhasil Tambah Data');
        return back();
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $update = $menu->update($request->except('_token', '_method'));
        toastr()->success('Menu berhasil diperbaharui');
        return back();
    }

    public function destroy($id)
    {
        Menu::find($id)->delete();
        toastr()->success('Menu berhasil dihapus');
        return back();
    }
    public function createPermission(Request $request)
    {
        Permissions::create($request->all());
        toastr()->success('Permission berhasil dibuat');
        return back();
    }
}
