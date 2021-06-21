@extends('layouts.app')
@section('title', 'Pemetaan Daerah Rawan Longsor')

@section('content')
<main>
  <div class="container content">

    <div data-aos="fade-right" class="card header-card text-white shadow">
      <div class="card-body">
        <h1 class="align-middle"><i class="fad fa-map-marked-alt mr-2"></i> Peta Daerah Rawan</h1>
      </div>
    </div>
    
    <div data-aos="zoom-in-up" class="card map-card shadow-sm">
      <div class="card-body">
        <div id="mapid"></div>
      </div>
    </div>

    <div class="row justify-content-around data-keseluruhan px-sm-5">
      <div class="col-sm-3">
        <h3>
          <i class="fas fa-circle fa-xl text-rendah mr-2"></i> 
          Tidak Rawan 
          <span class="float-right">{{ $tidak_rawan }} ({{ number_format($trp, 2) }}%)</span>
        </h3>
      </div>
      <div class="col-sm-3">
        <h3>
          <i class="fas fa-circle fa-xl text-sedang mr-2"></i> 
          Rawan Sedang 
          <span class="float-right">{{ $rawan_sedang }} ({{ number_format($rsp , 2) }}%)</span>
        </h3>
      </div>
      <div class="col-sm-3">
        <h3>
          <i class="fas fa-circle fa-xl text-tinggi mr-2"></i> 
          Rawan Tinggi 
          <span class="float-right">{{ $rawan_tinggi }} ({{ number_format($rtp , 2) }}%)</span>
        </h3>
      </div>
    </div>

    <div data-aos="fade-right" class="card header-card text-white shadow">
      <div class="card-body">
        <h1 class="align-middle"><i class="fad fa-table mr-2"></i> Data Daerah Rawan</h1>
      </div>
    </div>

    <div data-aos="zoom-in-up" class="card table-card shadow rounded-lg">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover border text-center text-nowrap" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Lokasi</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td class="text-center" scope="row">{{ $item->nama_lokasi }}</td>
                  <td>{{ $item->kecamatan }}</td>
                  <td>{{ $item->latitude }}, {{ $item->longitude }}</td>
                  <td>
                    @if ($item->tingkat_kerawanan == 'Tidak Rawan')
                      <span class="status tidak-rawan">{{ $item->tingkat_kerawanan }}</span>
                    @elseif ($item->tingkat_kerawanan == 'Rawan Sedang')
                      <span class="status rawan-sedang">{{ $item->tingkat_kerawanan }}</span>
                    @else
                      <span class="status rawan-tinggi">{{ $item->tingkat_kerawanan }}</span>  
                    @endif
                  </td>
                  <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal-{{ $item->id }}">
                      <i class="fal fa-eye"></i>
                      Detail
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div data-aos="fade-up" class="about border-top py-4">
    <div class="container">
      <p class="font-weight-bold">Tentang Aplikasi Ini</p>
      <p class="font-weight-bold text-muted">Lorem ipsum dolor sit.</p>
      <p class="text-justify">
        &emsp; Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos temporibus, tempore officiis soluta rerum quo perferendis eius est porro. Tempora reprehenderit odio cupiditate magni, optio tempore laborum explicabo ipsa eligendi fugit aperiam non fugiat neque quas temporibus architecto ipsum suscipit quod modi id soluta rem voluptas perspiciatis facilis. Beatae magni cupiditate animi delectus architecto aliquam ut neque necessitatibus excepturi ad nostrum non incidunt doloremque, omnis illo quam unde dolorum nihil dicta placeat sed tenetur. Voluptate, fugit pariatur! Id laudantium autem qui, odit vel voluptatum fugit numquam animi aut non quis quasi, consequatur fugiat! Inventore cumque magnam veniam, debitis magni minima.
      </p>
      <p class="font-weight-bold text-muted">Lorem, ipsum.</p>
      <p class="text-justify">
        &emsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, ullam rerum cum non amet officiis aliquam! Sed, nobis nesciunt eaque neque nulla ipsum laborum facilis ducimus! Dignissimos blanditiis consectetur similique hic non numquam, quae iure aperiam illum voluptates. Accusantium, aliquid pariatur? Praesentium rerum hic, odio neque expedita maxime facilis, blanditiis deserunt quisquam pariatur mollitia sint ullam laboriosam voluptatem repellat officia consectetur accusantium incidunt animi ipsum? Molestias tenetur autem voluptas praesentium.
      </p>
    </div>
  </div>

</main>
@endsection

@push('addon-script')
  @include('includes.map-script')
@endpush