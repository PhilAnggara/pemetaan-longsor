<!-- Modal Detail -->
<div class="modal modal-detail fade" id="detailModal-id" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
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
                <td class="text-right">Dendengan Dalam, Lingk. I</td>
              </tr>
              <tr>
                <th scope="row">Kecamatan</th>
                <td>:</td>
                <td class="text-right">Paal Dua</td>
              </tr>
              <tr>
                <th scope="row">Gari Lintang</th>
                <td>:</td>
                <td class="text-right">1.4827016516049476</td>
              </tr>
              <tr>
                <th scope="row">Gari Bujur</th>
                <td>:</td>
                <td class="text-right">124.8567744425684</td>
              </tr>
              <tr>
                <th scope="row">Status</th>
                <td>:</td>
                <td class="text-right"><span class="status rawan-sedang">Rawan Sedang</span></td>
              </tr>
            </table>
          </div>
          <div class="col col-sm-6">
            <small class="text-muted">Informasi Kondisi Daerah</small>
            <table class="table">
              <tr>
                <th scope="row">Jenis Tanah</th>
                <td>:</td>
                <td class="text-right">Regosol (Sangat Peka)</td>
              </tr>
              <tr>
                <th scope="row">Curah Hujan</th>
                <td>:</td>
                <td class="text-right">200mm (Menengah)</td>
              </tr>
              <tr>
                <th scope="row">Kemiringan Lereng</th>
                <td>:</td>
                <td class="text-right">Agak Curam (25%)</td>
              </tr>
              <tr>
                <th scope="row">Ketinggian Lokasi</th>
                <td>:</td>
                <td class="text-right">1500m (Rendah)</td>
              </tr>
              <tr>
                <th scope="row">Penggunaan Lahan</th>
                <td>:</td>
                <td class="text-right">Perkebunan (Peka)</td>
              </tr>
            </table>
          </div>
        </div>
        <small class="text-muted">Gambar Lokasi</small>
        <div class="fotorama" data-width="100%" data-nav="thumbs" data-fit="cover">
          <img src="{{ url('frontend/images/contoh-1.jpg') }}">
          <img src="{{ url('frontend/images/contoh-2.jpg') }}">
          <img src="{{ url('frontend/images/contoh-3.jpg') }}">
        </div>
      </div>
    </div>
  </div>
</div>