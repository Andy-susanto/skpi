<div class="form-group">
  <label for="">Nama Kegiatan</label>
  <input type="text" class="form-control" name="nama_kategori" id="" aria-describedby="helpId" placeholder="Nama Kegiatan" value="{{$data['pokok']->nama_kategori}}">
</div>
<div class="form-group">
    <label for="">Jenis Kegiatan</label>
    <select class="form-control" name="ref_jenis_kegiatan_id[]" id="ref_jenis_kegiatan_id" required multiple>
        @forelse (Helper::jenis_kegiatan() as $jenis_kegiatan)
            <option value="{{ $jenis_kegiatan->id_ref_jenis_kegiatan }}" {{in_array($jenis_kegiatan->id_ref_jenis_kegiatan,$data['jenis_kegiatan']) ? 'selected' : ''}}>
                {{ $jenis_kegiatan->nama }}
            </option>
        @empty
            <option>Tidak Ada Data</option>
        @endforelse
    </select>
</div>
<button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-save"
        aria-hidden="true"></i> Simpan Data</button>

@include('plugins.select2')

<script>
    $('#ref_jenis_kegiatan_id').select2();
</script>
