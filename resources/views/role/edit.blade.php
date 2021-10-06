@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h1 class="m-0 text-dark">Ubah Role</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{url('roles/'.$role->id_role)}}">
                    @csrf
                    @method('PATCH')
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Nama Role</label>

                        <div class="col-sm-7">
                          <input class="form-control" id="inputPassword3" placeholder="Nama Role" type="text" name="nama_role" value="{{$role->nama_role}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>

                        <div class="col-sm-7">
                          <textarea class="form-control" name="keterangan_role" placeholder="Deskripsi">{{$role->keterangan_role}}</textarea>
                        </div>
                      </div>
                      <div class="form-group">

                          <div class="col-sm-6">
                            <label for="inputEmail3" >Roles Menu Permission</label>
                            <ul class="checktree">
                               @foreach($menus as $menu)
                                  @if(count($menu->submenus)=="0")
                                    <li><input type="checkbox" name="menu_id[]" value="{{$menu->id_menu}}" {{in_array($menu->id_menu,$role_menus)?"checked":""}}> <b> {{$menu->nama_menu}}</b>
                                        @if(count($menu->permissions) > 0)
                                        <ul>
                                          @foreach($menu->permissions as $permission)
                                            <li>
                                              <input type="checkbox" name="permission_id[]" value="{{$permission->id_permission}}" {{in_array($permission->id_permission,$role_permissions)?"checked":""}}> {{$permission->keterangan_permission}}
                                            </li>
                                          @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                  @else
                                      <li>
                                          <i class="{{$menu->icon}}"></i>
                                          <input type="checkbox" name="menu_id[]" value="{{$menu->id_menu}}" {{in_array($menu->id_menu,$role_menus)?"checked":""}}> <b> {{$menu->nama_menu}}</b>
                                          <ul>
                                              @foreach($menu->submenus as $submenu)

                                                  @if(count($submenu->submenus)==0)
                                                    <li>
                                                      <i class="{{$submenu->icon}}"></i>
                                                      <input type="checkbox" name="menu_id[]" value="{{$submenu->id_menu}}" {{in_array($submenu->id_menu,$role_menus)?"checked":""}}> <b> {{$submenu->nama_menu}}</b>
                                                      @if(count($submenu->permissions) > 0)
                                                      <ul>
                                                        @foreach($submenu->permissions as $permission)
                                                          <li>
                                                            <input type="checkbox" name="permission_id[]" value="{{$permission->id_permission}}" {{in_array($permission->id_permission,$role_permissions)?"checked":""}}> {{'('.$permission->permission.') '.$permission->keterangan_permission}}
                                                          </li>
                                                        @endforeach
                                                      </ul>
                                                      @endif

                                                    </li>
                                                  @else
                                                    <li>
                                                      <i class="{{$submenu->icon}}"></i>
                                                      <input type="checkbox" name="menu_id[]" value="{{$submenu->id_menu}}" {{in_array($submenu->id_menu,$role_menus)?"checked":""}}> <b> {{$submenu->nama_menu}}</b>
                                                      <ul>
                                                        @foreach($submenu->submenus as $submenu2)
                                                          @if(count($submenu2->submenus)==0)
                                                          <li>
                                                            <input type="checkbox" name="menu_id[]" value="{{$submenu2->id_menu}}" {{in_array($submenu2->id_menu,$role_menus)?"checked":""}} > <b> {{$submenu2->nama_menu}}</b>
                                                              @if(count($submenu2->permissions) > 0)
                                                              <ul>
                                                                @foreach($submenu2->permissions as $permission)
                                                                  <li>
                                                                    <input type="checkbox" name="permission_id[]" value="{{$permission->id_permission}}" {{in_array($permission->id_permission,$role_permissions)?"checked":""}}> {{'('.$permission->permission.') '.$permission->keterangan_permission}}
                                                                  </li>
                                                                @endforeach
                                                              </ul>
                                                              @endif
                                                          </li>
                                                          @endif
                                                        @endforeach
                                                      </ul>
                                                    </li>

                                                  @endif
                                              @endforeach
                                          </ul>
                                      </li>
                                  @endif
                              @endforeach
                            </ul>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                          <button class="btn btn-sm btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Update</button>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">

                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@stop

@include('plugins.alertify')
@include('plugins.datatable')
@include('plugins.simple-tree')

@section('js')
<script>
      function confirmation(id) {
        alertify.confirm("Confirmation!","Are sure to delete this data?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
  </script>
@endsection
