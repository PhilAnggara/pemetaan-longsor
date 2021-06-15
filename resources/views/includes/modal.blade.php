<!-- Modal Detail -->
@foreach ($items as $item)
  <div class="modal modal-detail fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Informasi Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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