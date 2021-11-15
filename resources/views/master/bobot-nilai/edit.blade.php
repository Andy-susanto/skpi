<div class="form-group">
    <label for="">Jenis Kegiatan</label>
    <select class="form-control" name="ref_jenis_kegiatan_id" id="" required>
        @forelse (Helper::jenis_kegiatan() as $jenis_kegiatan)
            <option value="{{ $jenis_kegiatan->id_ref_jenis_kegiatan }}" {{$data['bobot']->ref_jenis_kegiatan_id == $jenis_kegiatan->id_ref_jenis_kegiatan ?'selected' : ''}}>
                {{ $jenis_kegiatan->nama }}
            </option>
        @empty
            <option>Tidak Ada Data</option>
        @endforelse
    </select>
</div>
<div class="form-group">
    <label for="">Penyelenggara</label>
    <select class="form-control" name="ref_penyelenggara_id" id="" required>
        @forelse (Helper::penyelenggara() as $penyelenggara)
            <option value="{{ $penyelenggara->id_ref_penyelenggara }}" {{$data['bobot']->id_ref_penyelenggara == $jenis_kegiatan->id_ref_penyelenggara_id ?'selected' : ''}}>
                {{ $penyelenggara->nama }}
            </option>
        @empty
            <option>Tidak Ada Data</option>
        @endforelse
    </select>
</div>
<div class="form-group">
    <label for="">Tingkat</label>
    <select class="form-control" name="ref_tingkat_id" id="" required>
        @forelse (Helper::tingkat() as $tingkat)
            <option value="{{ $tingkat->id_ref_tingkat }}" {{$data['bobot']->id_ref_tingkat == $jenis_kegiatan->id_ref_tingkat ?'selected' : ''}}>{{ $tingkat->nama }}</option>
        @empty
            <option>Tidak Ada Data</option>
        @endforelse
    </select>
</div>
<div class="form-group">
    <label for="">Prestasi</label>
    <select class="form-control" name="ref_peran_prestasi_id" id="" required>
        @forelse (Helper::prestasi() as $prestasi)
            <option value="{{ $prestasi->id_ref_peran_prestasi }}" {{$data['bobot']->id_ref_peran_prestasi == $jenis_kegiatan->id_ref_peran_prestasi ?'selected' : ''}}>{{ $prestasi->nama }}
            </option>
        @empty
            <option>Tidak Ada Data</option>
        @endforelse
    </select>
</div>
<div class="form-group">
    <label for="">Bobot</label>
    <input type="number" class="form-control" name="bobot" id="" aria-describedby="helpId"
        placeholder="Isi Bobot Niali" value="{{$data['bobot']->bobot}}" required>
</div>
<button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-save"
        aria-hidden="true"></i> Simpan Data</button>
