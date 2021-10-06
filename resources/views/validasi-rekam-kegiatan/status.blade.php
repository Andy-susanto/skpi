@if ($row->validasi == '1')
    <span class="text-white badge badge-warning"><i>di Ajukan</i></span>
@elseif ($row->validasi == '2')
    <span class="text-white badge badge-success"><i>di Validasi</i></span>
@elseif ($row->validasi == '3')
    <span class="text-white badge badge-danger"><i>di Tolak</i></span>
@endif
