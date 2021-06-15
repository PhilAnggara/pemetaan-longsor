<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title white" id="tambahDataModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('lokasi.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

        <div class="modal-body">

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="nama_lokasi">Nama Lokasi</label>
                <input type="text" id="nama_lokasi" class="form-control" placeholder="Nama Lokasi"
                  name="nama_lokasi" required>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select class="form-select" id="kecamatan" name="kecamatan" required>
                  <option value="" selected disabled>-- Pilih Kecamatan --</option>
                  <option>Paal Dua</option>
                  <option>Tikala</option>
              </select>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="latitude ">Gari Lintang</label>
                <input type="text" id="latitude " class="form-control" placeholder="Gari Lintang"
                  name="latitude" required>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="longitude">Gari Bujur</label>
                <input type="text" id="longitude" class="form-control" placeholder="Gari Bujur"
                  name="longitude" required>
              </div>
            </div>
            <hr>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="jenis_tanah">Jenis Tanah</label>
                <select class="form-select" id="jenis_tanah" name="jenis_tanah" required>
                  <option value="" selected disabled>-- Pilih Jenis Tanah --</option>
                  <option>Inceptisol Ultisol</option>
                  <option>Mediteran</option>
                  <option>Andosol, grumosol</option>
                  <option>Regosol</option>
              </select>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="curah_hujan">Cuarh Hujan <span class="text-lowercase">(mm)</span></label>
                <input type="text" id="curah_hujan" class="form-control" placeholder="Curah Hujan"
                  name="curah_hujan" required>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="kemiringan_lereng">Kemiringan Lereng <span class="text-lowercase">(%)</span></label>
                <input type="text" id="kemiringan_lereng" class="form-control" placeholder="Kemiringan Lereng" name="kemiringan_lereng" required>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="ketinggian_lokasi">Ketinggian Lokasi <span class="text-lowercase">(m)</span></label>
                <input type="number" id="ketinggian_lokasi" class="form-control" placeholder="Ketinggian Lokasi" name="ketinggian_lokasi" required>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="penggunaan_lahan">Jenis Penggunaan Lahan</label>
                <select class="form-select" id="penggunaan_lahan" name="penggunaan_lahan" required>
                  <option value="" selected disabled>-- Pilih Penggunaan Lahan --</option>
                  <option>Hutan</option>
                  <option>Perkebunan</option>
                  <option>Pemukiman Tinggal</option>
              </select>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="path">Foto Lokasi</label>
                <input type="file" id="path" class="form-control" placeholder="Foto Lokasi" name="path" required>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn icon icon-left btn-success">
            <i class="fal fa-plus"></i>
            Tambahkan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Detail -->
@foreach ($items as $item)
  <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title white" id="detailModalLabel">Informasi Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col col-sm-6">
              <small class="text-muted">Informasi Umum</small>
              <div class="table-responsive">
                <table class="table text-nowrap">
                  <tr>
                    <th scope="row">Nama Lokasi</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->nama_lokasi }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Kecamatan</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->kecamatan }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Gari Lintang</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->latitude }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Gari Bujur</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->longitude }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td>:</td>
                    <td class="text-right">
                      @if ($item->tingkat_kerawanan == 'Tidak Rawan')
                        <span class="status tidak-rawan">{{ $item->tingkat_kerawanan }}</span>
                      @elseif ($item->tingkat_kerawanan == 'Rawan Sedang')
                        <span class="status rawan-sedang">{{ $item->tingkat_kerawanan }}</span>
                      @else
                        <span class="status rawan-tinggi">{{ $item->tingkat_kerawanan }}</span>  
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col col-sm-6">
              <small class="text-muted">Informasi Kondisi Daerah</small>
              <div class="table-responsive">
                <table class="table text-nowrap">
                  <tr>
                    <th scope="row">Jenis Tanah</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->jenis_tanah }} (Sangat Peka)</td>
                  </tr>
                  <tr>
                    <th scope="row">Curah Hujan</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->curah_hujan }}mm (Menengah)</td>
                  </tr>
                  <tr>
                    <th scope="row">Kemiringan Lereng</th>
                    <td>:</td>
                    <td class="text-right">Agak Curam ({{ $item->kemiringan_lereng }}%)</td>
                  </tr>
                  <tr>
                    <th scope="row">Ketinggian Lokasi</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->ketinggian_lokasi }}m (Rendah)</td>
                  </tr>
                  <tr>
                    <th scope="row">Penggunaan Lahan</th>
                    <td>:</td>
                    <td class="text-right">{{ $item->penggunaan_lahan }} (Peka)</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <small class="text-muted">Gambar Lokasi</small>
          <div class="fotorama" data-width="100%" data-nav="thumbs" data-fit="cover">
            @foreach ($item->gambar as $gambar)
              <img src="{{ Storage::url($gambar->path) }}">
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal Edit -->
@foreach ($items as $item)
  <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title white" id="editModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body border-bottom">

          <div class="row">
            @foreach ($item->gambar as $gambar)
              <div class="col-sm-4 text-center mb-2">
                <img src="{{ Storage::url($gambar->path) }}" class="rounded img-thumbnail">
                @if ($item->gambar->count() > 1)
                  <form action="{{ route('delete-image', $gambar->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm">
                      Hapus
                    </button>
                  </form>
                @endif
              </div>
            @endforeach
          </div>

          <form action="{{ route('upload-image') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_lokasi" value="{{ $item->id }}">
            <div class="input-group mb-3">
              <input type="file" class="form-control" id="path"
              name="path" placeholder="Foto Lokasi" required>
              <div class="input-group-append">
                <button class="btn icon icon-left btn-primary" type="submit">
                  <i class="fal fa-image"></i>
                  Tambah Gambar
                </button>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-body">

          <form action="{{ route('lokasi.update', $item->id) }}" method="post">
            @method('put')
            @csrf
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="nama_lokasi">Nama Lokasi</label>
                  <input type="text" id="nama_lokasi" class="form-control" placeholder="Nama Lokasi"
                    name="nama_lokasi" value="{{ $item->nama_lokasi }}" required>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <select class="form-select" id="kecamatan" name="kecamatan" required>
                    <option selected disabled>-- Pilih Kecamatan --</option>
                    <option {{ $item->kecamatan == 'Paal Dua' ? 'selected' : '' }}>Paal Dua</option>
                    <option {{ $item->kecamatan == 'Tikala' ? 'selected' : '' }}>Tikala</option>
                </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="latitude ">Gari Lintang</label>
                  <input type="text" id="latitude " class="form-control" placeholder="Gari Lintang"
                    name="latitude" value="{{ $item->latitude }}" required>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="longitude">Gari Bujur</label>
                  <input type="text" id="longitude" class="form-control" placeholder="Gari Bujur"
                    name="longitude" value="{{ $item->longitude }}" required>
                </div>
              </div>
              <hr>
    
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="status">Status</label>
                  <div class="mt-2">
                    <span class="status rawan-sedang">Rawan Sedang</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="jenis_tanah">Jenis Tanah</label>
                  <select class="form-select" id="jenis_tanah" name="jenis_tanah" required>
                    <option selected disabled>-- Pilih Jenis Tanah --</option>
                    <option {{ $item->jenis_tanah == 'Inceptisol Ultisol' ? 'selected' : '' }}>Inceptisol Ultisol</option>
                    <option {{ $item->jenis_tanah == 'Mediteran' ? 'selected' : '' }}>Mediteran</option>
                    <option {{ $item->jenis_tanah == 'Andosol, grumosol' ? 'selected' : '' }}>Andosol, grumosol</option>
                    <option {{ $item->jenis_tanah == 'Regosol' ? 'selected' : '' }}>Regosol</option>
                </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="curah_hujan">Cuarh Hujan <span class="text-lowercase">(mm)</span></label>
                  <input type="text" id="curah_hujan" class="form-control" placeholder="Curah Hujan"
                    name="curah_hujan" value="{{ $item->curah_hujan }}" required>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="kemiringan_lereng">Kemiringan Lereng <span class="text-lowercase">(%)</span></label>
                  <input type="text" id="kemiringan_lereng" class="form-control" placeholder="Kemiringan Lereng"
                    name="kemiringan_lereng" value="{{ $item->kemiringan_lereng }}" required>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="ketinggian_lokasi">Ketinggian Lokasi <span class="text-lowercase">(m)</span></label>
                  <input type="number" id="ketinggian_lokasi" class="form-control" placeholder="Ketinggian Lokasi"
                    name="ketinggian_lokasi" value="{{ $item->ketinggian_lokasi }}" required>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="penggunaan_lahan">Jenis Penggunaan Lahan</label>
                  <select class="form-select" id="penggunaan_lahan" name="penggunaan_lahan" required>
                    <option selected disabled>-- Pilih Penggunaan Lahan --</option>
                    <option {{ $item->penggunaan_lahan == 'Hutan' ? 'selected' : '' }}>Hutan</option>
                    <option {{ $item->penggunaan_lahan == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
                    <option {{ $item->penggunaan_lahan == 'Pemukiman Tinggal' ? 'selected' : '' }}>Pemukiman Tinggal</option>
                </select>
                </div>
              </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
              <button type="submit" class="btn icon icon-left btn-primary">
                <i class="fal fa-save"></i>
                Simpan
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal Hapus -->
@foreach ($items as $item)
  <div class="modal fade" id="hapusModal-{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title white" id="hapusModalLabel">Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="my-3">Yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <form action="{{ route('lokasi.destroy', $item->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn icon icon-left btn-danger">
              <i class="fal fa-trash-alt"></i>
              Hapus
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal Example -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title white" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn icon icon-left btn-success">
          <i class="fal fa-plus"></i>
          Tambahkan
        </button>
      </div>
    </div>
  </div>
</div>