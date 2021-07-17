<!-- Modal Detail -->
@foreach ($items as $item)
  <div class="modal modal-detail fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white" id="detailModalLabel">Informasi Detail</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col col-sm-6">
              <small class="text-muted">Informasi Umum</small>
              <table class="table">
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
            <div class="col col-sm-6">
              <small class="text-muted">Informasi Kondisi Daerah</small>
              <table class="table">
                <tr>
                  <th scope="row">Jenis Tanah</th>
                  <td>:</td>
                  <td class="text-right">{{ $item->jenis_tanah }} (Sangat Peka)</td>
                </tr>
                <tr>
                  <th scope="row">Curah Hujan</th>
                  <td>:</td>
                  <td class="text-right">{{ $item->curah_hujan }} mm/bln (Menengah)</td>
                </tr>
                <tr>
                  <th scope="row">Kemiringan Lereng</th>
                  <td>:</td>
                  <td class="text-right">Agak Curam ({{ $item->kemiringan_lereng }}%)</td>
                </tr>
                <tr>
                  <th scope="row">Ketinggian Lokasi</th>
                  <td>:</td>
                  <td class="text-right">{{ $item->ketinggian_lokasi }} m (Rendah)</td>
                </tr>
                <tr>
                  <th scope="row">Penggunaan Lahan</th>
                  <td>:</td>
                  <td class="text-right">{{ $item->penggunaan_lahan }} (Peka)</td>
                </tr>
              </table>
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

<!-- Modal Cek Lokasi -->
<div class="modal fade" id="hitungModal" tabindex="-1" aria-labelledby="hitungModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="hitungModalLabel">Cek Status Lokasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('cek-lokasi') }}" method="post">
        @csrf

        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nama_lokasi">Nama Lokasi</label>
              <input type="text" class="form-control" id="nama_lokasi" placeholder="Nama Lokasi"
              name="nama_lokasi" required>
            </div>
            <div class="form-group col-md-6">
              <label for="jenis_tanah">Jenis Tanah</label>
              <select class="form-control" id="jenis_tanah" name="jenis_tanah" required>
                <option value="" selected disabled>-- Pilih Jenis Tanah --</option>
                <option>Alluvial</option>
                <option>Latosol/Litosol</option>
                <option>Entisol</option>
              </select>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="curah_hujan">Curah Hujan (mm/bln)</label>
              <input type="text" id="curah_hujan" class="form-control" placeholder="Curah Hujan" name="curah_hujan" required>
            </div>
            <div class="form-group col-md-6">
              <label for="kemiringan_lereng">Kemiringan Lereng (%)</label>
              <input type="text" id="kemiringan_lereng" class="form-control" placeholder="Kemiringan Lereng" name="kemiringan_lereng" required>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="ketinggian_lokasi">Ketinggian Lokasi (m)</label>
              <input type="number" class="form-control" id="ketinggian_lokasi" placeholder="Ketinggian Lokasi"
              name="ketinggian_lokasi" required>
            </div>
            <div class="form-group col-md-6">
              <label for="penggunaan_lahan">Penggunaan Lahan</label>
              <select class="form-control" id="penggunaan_lahan" name="penggunaan_lahan" required>
                <option value="" selected disabled>-- Pilih Penggunaan Lahan --</option>
                  <option>Hutan</option>
                  <option>Perkebunan</option>
                  <option>Pemukiman Tinggal</option>
              </select>
            </div>
          </div>

          <hr>
          
          <div class="row">
            <div class="col-md-6">
              <button type="submit" class="btn icon icon-left btn-primary">
                <i class="fal fa-crosshairs mr-1"></i>
                Cek Status
              </button>
              <button type="button" class="btn icon icon-left btn-outline-secondary">
                <i class="fal fa-undo mr-1"></i>
                Reset
              </button>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
              {{-- <span class="status tidak-rawan btn-block">Tidak Rawan</span> --}}
              <small class="text-muted font-italic">Status Lokasi</small>
            </div>
          </div>

        </div>
        {{-- <div class="modal-footer justify-content-start">
          <button type="submit" class="btn icon icon-left btn-primary">
            <i class="fal fa-crosshairs mr-1"></i>
            Cek Status
          </button>
          <button type="submit" class="btn icon icon-left btn-outline-secondary">
            <i class="fal fa-undo mr-1"></i>
            Reset
          </button>
        </div> --}}
      </form>
    </div>
  </div>
</div>