<div class="dropdown">
    <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                Proses
            </button>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item text-success" onclick="konfirmasi('update'+{{$row['id']}}+'{{$row['jenis_kegiatan']}}','Apakah Anda Yakin ingin Menvalidasi data ini ?');" href="#"><i class="fa fa-check" aria-hidden="true"></i> Validasi</a>
        <form action="{{route('validasi.update',[$row['jenis_kegiatan'],$row['id']])}}" id="update{{$row['id'].$row['jenis_kegiatan']}}" method="post">
            @csrf
            @method('put')
        </form>
        <a class="dropdown-item text-danger" onclick="konfirmasi('hapus'+{{$row['id']}}+'{{$row['jenis_kegiatan']}}','Apakah Anda Yakin ingin menghapus data ini ? ');" href="#"><i class="fa fa-times" aria-hidden="true"></i> Tolak</a>
        <form action="{{route('validasi.destroy',[$row['jenis_kegiatan'],$row['id']])}}" id="hapus{{$row['id'].$row['jenis_kegiatan']}}" method="post">
            @csrf
            @method('delete')
        </form>
        <a href="" class="dropdown-item">
            <i class="fa fa-info" aria-hidden="true"></i> Detail
        </a>
    </div>
</div>
