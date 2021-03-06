@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )

@if (config('adminlte.usermenu_profile_url', false))
    @php( $profile_url = Auth::user()->adminlte_profile_url() )
@endif

@if (config('adminlte.use_route_url', false))
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li class="nav-item dropdown user-menu">
    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img @if ((Auth::user()->usertype == '1' || in_array(3,Auth::user()->role_id())) && isset(Auth::user()->siakad_file->path) )
            src="https://siakad.unja.ac.id/{{Auth::user()->SiakadUser->siakad_file->path}}"
            @elseif(Auth::user()->kepeg_pegawai)
                @if (Auth::user()->kepeg_pegawai->biodata->file_foto)
                src="https://simpeg.unja.ac.id/foto/{{Auth::user()->kepeg_pegawai->biodata->file_foto}}"
                @endif
            @else
                src=""
            @endif
                 class="user-image float-left img-circle elevation-2"
                 alt="
             @if (Auth::user()->usertype == '1' || in_array(3,Auth::user()->role_id() ) )
                 {{Auth::user()->siakad_mhspt->mahasiswa->nama_mahasiswa }}
             @else
                {{Helper::nama_gelar(Auth::user()->kepeg_pegawai)}}
             @endif">

        @endif
            @if (Auth::user()->usertype == '1' || in_array( 3,Auth::user()->role_id() ) )
               <span class="font-bold">{{strtoupper(Auth::user()->siakad_mhspt->mahasiswa->nama_mahasiswa) }}</span>
            @else
            <span class="font-black">{{strtoupper(Helper::nama_gelar(Auth::user()->kepeg_pegawai))}}</span>
            @endif
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image'))
                    <img @if ((Auth::user()->usertype == '1' || in_array(3,Auth::user()->role_id())) && isset(Auth::user()->siakad_file->path))
                    src="https://siakad.unja.ac.id/{{Auth::user()->SiakadUser->siakad_file->path}}"
                    @elseif(Auth::user()->kepeg_pegawai)
                @if (Auth::user()->kepeg_pegawai->biodata->file_foto)
                src="https://simpeg.unja.ac.id/foto/{{Auth::user()->kepeg_pegawai->biodata->file_foto}}"
                @endif
                    @else
                        src=""
                    @endif
                         class="img-circle elevation-2"
                @endif
                @if (Auth::user()->usertype == '1' || in_array( 3,Auth::user()->role_id() ) )
                <span><i class="fa fa-user" aria-hidden="true"></i> {{strtoupper(Auth::user()->siakad_mhspt->mahasiswa->nama_mahasiswa) }}</span>
            @else
            {{strtoupper(Helper::nama_gelar(Auth::user()->kepeg_pegawai))}}
            @endif
                <p class="@if(!config('adminlte.usermenu_image')) mt-0 @endif">
                    {{ strtoupper(Auth::user()->name) }}
                    @if(config('adminlte.usermenu_desc'))
                        <small>{{ Auth::user()->adminlte_desc() }}</small>
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        @if(Session::has('kamuflase'))
        <li class="user-footer">
            <a name="" id="" class="btn btn-default btn-flat btn-block" href="{{route('logout-as',encrypt(Auth::user()->id))}}" role="button"><i class="fa fa-power-off" aria-hidden="true"></i> Logout As  @if (Auth::user()->usertype == '1' || in_array( 3,Auth::user()->role_id() ) )
                {{strtoupper(Auth::user()->siakad_mhspt->mahasiswa->nama_mahasiswa) }}
            @else
            {{strtoupper(Helper::nama_gelar(Auth::user()->kepeg_pegawai))}}
            @endif</a>
        </li>
        @endif
        <li class="user-footer">
            @if($profile_url)
                <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user"></i>
                    {{ __('adminlte::menu.profile') }}
                </a>
            @endif
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"></i>
                {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>
