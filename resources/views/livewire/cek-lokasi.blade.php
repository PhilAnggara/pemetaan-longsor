<div>
  <div class="modal-body">
    <form wire:submit.prevent="cekLokasi">
      @csrf
  
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nama_lokasi">Nama Lokasi</label>
          <input wire:model="nama_lokasi" type="text" class="form-control" id="nama_lokasi" placeholder="Nama Lokasi" name="nama_lokasi" required>
        </div>
        <div class="form-group col-md-6">
          <label for="kecamatan">Kecamatan</label>
          <select wire:model="kecamatan" class="form-control" id="kecamatan" name="kecamatan" required>
            <option value="" selected>-- Pilih Kecamatan --</option>
            <option>Bunaken</option>
            <option>Bunaken Kepulauan</option>
            <option>Malalayang</option>
            <option>Paal Dua</option>
            <option>Mapanget</option>
            <option>Sario</option>
            <option>Singkil</option>
            <option>Tikala</option>
            <option>Tuminting</option>
            <option>Wanea</option>
            <option>Wenang</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="latitude ">Gari Lintang</label>
          <input wire:model="latitude" type="text" id="latitude " class="form-control" placeholder="Gari Lintang" name="latitude" required>
        </div>
        <div class="form-group col-md-6">
          <label for="longitude">Gari Bujur</label>
          <input wire:model="longitude" type="text" id="longitude" class="form-control" placeholder="Gari Bujur" name="longitude" required>
        </div>
      </div>

      <hr>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="jenis_tanah">Jenis Tanah</label>
          <select wire:model="jenis_tanah" class="form-control" id="jenis_tanah" name="jenis_tanah" required>
            <option value="" selected>-- Pilih Jenis Tanah --</option>
            <option value="Alluvial">Alluvial</option>
            <option value="Latosol/Litosol">Latosol/Litosol</option>
            <option value="Entisol">Entisol</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="curah_hujan">Curah Hujan (mm/bln)</label>
          <input wire:model="curah_hujan" type="number" id="curah_hujan" class="form-control" placeholder="Curah Hujan yang turun perbulan" name="curah_hujan" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="kemiringan_lereng">Kemiringan Lereng (%)</label>
          <input wire:model="kemiringan_lereng" type="number" id="kemiringan_lereng" class="form-control" placeholder="Kemiringan Lereng" name="kemiringan_lereng" required>
        </div>
        <div class="form-group col-md-6">
          <label for="ketinggian_lokasi">Ketinggian Lokasi (m)</label>
          <input wire:model="ketinggian_lokasi" type="number" id="ketinggian_lokasi" class="form-control" placeholder="Ketinggian Lokasi" name="ketinggian_lokasi" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="penggunaan_lahan">Penggunaan Lahan</label>
          <select wire:model="penggunaan_lahan" class="form-control" id="penggunaan_lahan" name="penggunaan_lahan" required>
            <option value="" selected>-- Pilih Jenis Penggunaan Lahan --</option>
            <option value="Hutan">Hutan</option>
            <option value="Perkebunan">Perkebunan</option>
            <option value="Pemukiman Tinggal">Pemukiman Tinggal</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="path">Foto Lokasi</label>
          <div class="custom-file">
            <input wire:model="path" type="file" id="path" class="custom-file-input" placeholder="Foto Lokasi" name="path" required>
            <label class="custom-file-label" for="customFile">{{ $path ? $path->getClientOriginalName() : 'Choose File' }}</label>
          </div>
        </div>
      </div>
  
      <hr>
      
      <div class="row">
        <div class="col-md-6">
          <button type="submit" class="btn icon icon-left btn-info">
            <i class="fad fa-crosshairs mr-1"></i>
            Cek Status
          </button>
          <a wire:click="setelUlang" class="btn icon icon-left btn-outline-secondary">
            <i class="fal fa-undo mr-1"></i>
            Reset
          </a>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
          @if ($hasil == 'Tidak Rawan')
            <span class="status tidak-rawan btn-block">{{ $hasil }}</span>
          @elseif ($hasil == 'Rawan Sedang')
            <span class="status rawan-sedang btn-block">{{ $hasil }}</span>
          @elseif ($hasil == 'Rawan Tinggi')
            <span class="status rawan-tinggi btn-block">{{ $hasil }}</span>
          @else
            <small class="text-muted font-italic">Status Lokasi</small>
          @endif
        </div>
      </div>
  
    </form>
    
    {{-- <div class="calculation {{ $status ? 'd-block' : 'd-none' }}"> --}}
    <div class="calculation d-none">
      <hr>
      @if ($data)
      <div class="card shadow">
        <div class="card-body table-responsive">
          <h6 class="card-subtitle mb-2 text-center">Skor Fuzzyfikasi</h6>
          <table class="table table-bordered table-hover text-nowrap">
            <thead class="thead-light">
              <tr>
                <th class="text-center" scope="col">#</th>
                <th scope="col">Parameter Input</th>
                <th scope="col">Nilai</th>
                <th scope="col">Kelas</th>
                <th class="text-center" scope="col">Skor</th>
                <th class="text-center" scope="col">Nilai Linguistik</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="text-center" scope="row">1</th>
                <th>Jenis Tanah</th>
                <td>{{ $data['jenis_tanah'] }}</td>
                <td>{{ $data['a']['kelas'] }}</td>
                <td class="text-center">{{ $data['a']['skor'] }}</td>
                <td class="text-center">{{ $data['a']['linguistik'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">2</th>
                <th>Curah Hujan</th>
                <td>{{ $data['curah_hujan'] }} <small>mm/bulan</small></td>
                <td>{{ $data['b']['kelas'] }}</td>
                <td class="text-center">{{ $data['b']['skor'] }}</td>
                <td class="text-center">{{ $data['b']['linguistik'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">3</th>
                <th>Kemiringan Lereng</th>
                <td>{{ $data['kemiringan_lereng'] }} <small>%</small></td>
                <td>{{ $data['c']['kelas'] }}</td>
                <td class="text-center">{{ $data['c']['skor'] }}</td>
                <td class="text-center">{{ $data['c']['linguistik'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">4</th>
                <th>Ketinggian Lokasi</th>
                <td>{{ $data['ketinggian_lokasi'] }} <small>m</small></td>
                <td>{{ $data['d']['kelas'] }}</td>
                <td class="text-center">{{ $data['d']['skor'] }}</td>
                <td class="text-center">{{ $data['d']['linguistik'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">5</th>
                <th>Penggunaan Lahan</th>
                <td>{{ $data['penggunaan_lahan'] }}</td>
                <td>{{ $data['e']['kelas'] }}</td>
                <td class="text-center">{{ $data['e']['skor'] }}</td>
                <td class="text-center">{{ $data['e']['linguistik'] }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="card shadow mt-2">
        <div class="card-body table-responsive">
          <h6 class="card-subtitle mb-2 text-center">Rules Yang Digunakan</h6>
          <table class="table table-bordered text-center">
            <thead class="thead-light">
              <tr>
                <th scope="col">Jenis Tanah</th>
                <th scope="col">Curah Hujan</th>
                <th scope="col">Kemiringan Lereng</th>
                <th scope="col">Ketinggian Lokasi</th>
                <th scope="col">Penggunaan Lahan</th>
                <th scope="col">Kerawanan Longsor</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">{{ $data['a']['kelas'] }}</td>
                <td scope="row">{{ $data['b']['kelas'] }}</td>
                <td scope="row">{{ $data['c']['kelas'] }}</td>
                <td scope="row">{{ $data['d']['kelas'] }}</td>
                <td scope="row">{{ $data['e']['kelas'] }}</td>
                <th scope="row">
                  @if ($data['tingkat_kerawanan']  == 'Tidak Rawan')
                    <span class="text-rendah">Tidak Rawan</span>
                  @elseif ($data['tingkat_kerawanan']  == 'Rawan Sedang')
                    <span class="text-sedang">Rawan Sedang</span>
                  @else
                    <span class="text-tinggi">Rawan Tinggi</span>  
                  @endif
                </th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="card shadow mt-2">
        <div class="card-body table-responsive">
          <h6 class="card-subtitle mb-2 text-center">Deffuzifikasi</h6>
          <table class="table table-bordered table-hover text-nowrap">
            <thead class="thead-light">
              <tr>
                <th class="text-center" scope="col">#</th>
                <th scope="col">Parameter Input</th>
                <th class="text-center" scope="col">(x)</th>
                <th class="text-center" scope="col">Persamaan Yang Digunakan</th>
                <th class="text-center" scope="col">Derajat Keanggotaan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="text-center" scope="row">1</th>
                <th>Jenis Tanah</th>
                <td class="text-center">{{ $data['a']['skor'] }}</td>
                <td class="text-center">{{ $data['a']['eq'] }}</td>
                <td class="text-center">{{ $data['a']['dk'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">2</th>
                <th>Curah Hujan</th>
                <td class="text-center">{{ $data['b']['skor'] }}</td>
                <td class="text-center">{{ $data['b']['eq'] }}</td>
                <td class="text-center">{{ $data['b']['dk'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">3</th>
                <th>Kemiringan Lereng</th>
                <td class="text-center">{{ $data['c']['skor'] }}</td>
                <td class="text-center">{{ $data['c']['eq'] }}</td>
                <td class="text-center">{{ $data['c']['dk'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">4</th>
                <th>Ketinggian Lokasi</th>
                <td class="text-center">{{ $data['d']['skor'] }}</td>
                <td class="text-center">{{ $data['d']['eq'] }}</td>
                <td class="text-center">{{ $data['d']['dk'] }}</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">5</th>
                <th>Penggunaan Lahan</th>
                <td class="text-center">{{ $data['e']['skor'] }}</td>
                <td class="text-center">{{ $data['e']['eq'] }}</td>
                <td class="text-center">{{ $data['e']['dk'] }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="card shadow mt-2">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-center">Menghitung Deffuzifikasi dengan metode <i>Centroid Method / Center of Grafity</i></h6>
  
          <div class="container border p-3">
            <p>
              <b><i>y</i></b>&nbsp;&nbsp; = &nbsp;&nbsp;
              ( ({{ $data['a']['skor'] }} * {{ $data['a']['dk'] }}) + ({{ $data['b']['skor'] }} * {{ $data['b']['dk'] }}) + ({{ $data['c']['skor'] }} * {{ $data['c']['dk'] }}) + ({{ $data['d']['skor'] }} * {{ $data['d']['dk'] }}) + ({{ $data['e']['skor'] }} * {{ $data['e']['dk'] }}) )
              / ( ({{ $data['a']['dk'] }} + {{ $data['b']['dk'] }} + {{ $data['c']['dk'] }} + {{ $data['d']['dk'] }} + {{ $data['e']['dk'] }}) * 5 )
            </p>
            <p>
              <b><i>y</i></b>&nbsp;&nbsp; = &nbsp;&nbsp;
              {{ $data['pembilang'] }} / {{ $data['penyebut'] }}
            </p>
            <p>
              <b><i>y</i></b>&nbsp;&nbsp; = &nbsp;&nbsp;
              {{ number_format($data['skor_kerawanan'], 2) }}
            </p>
          </div>
          {{-- \begin{align} 
          & y = {\sum y \mu _r(y) \over \sum \mu _r(y)}
          \\\\ & y = {(20*1,00)+(24*0,60)+(23*0,70)+(14*0,40)+(15*0,50) \over (1,00+0,60+0,70+0,40+0,50)*5}
          \\\ & y = {63,6 \over 16}
          \\\\ & y = 3,975
          \end{align} --}}
  
          <br>
          <h5 class="card-title">
            Tingkat Kerawanan : 
            @if ($data['tingkat_kerawanan']  == 'Tidak Rawan')
              <span class="status tidak-rawan">Tidak Rawan</span>
            @elseif ($data['tingkat_kerawanan']  == 'Rawan Sedang')
              <span class="status rawan-sedang">Rawan Sedang</span>
            @else
              <span class="status rawan-tinggi">Rawan Tinggi</span>  
            @endif
          </h5>
        </div>
      </div>
      @endif
    </div>
  </div>

  <div class="modal-footer {{ $status ? 'd-flex' : 'd-none' }}">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <a wire:click="store" class="btn icon icon-left btn-primary">
      <i class="fal fa-save"></i>
      Simpan
    </a>
  </div>
</div>