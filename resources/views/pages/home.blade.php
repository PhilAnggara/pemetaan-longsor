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
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13415.65232772802!2d124.84158037631818!3d1.4744423090520349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1622990065385!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

    <div class="row justify-content-around data-keseluruhan px-sm-5">
      <div class="col-sm-3">
        <h3><i class="fas fa-circle fa-xl text-tinggi mr-2"></i> Rawan Tinggi <span class="float-right">6(12.0%)</span></h3>
      </div>
      <div class="col-sm-3">
        <h3><i class="fas fa-circle fa-xl text-sedang mr-2"></i> Rawan Sedang <span class="float-right">5(10.0%)</span></h3>
      </div>
      <div class="col-sm-3">
        <h3><i class="fas fa-circle fa-xl text-rendah mr-2"></i> Rawan Rendah <span class="float-right">9(18.0%)</span></h3>
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
              <tr>
                <td class="text-center" scope="row">Dendengan Dalam, Lingk. I</td>
                <td>Paal Dua</td>
                <td>1.4827016516049476, 124.8567744425684</td>
                <td>
                  <span class="status rawan-sedang">Rawan Sedang</span>
                </td>
                <td>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal-id">
                    <i class="fal fa-eye"></i>
                    Detail
                  </button>
                </td>
              </tr>
              <tr>
                <td class="text-center" scope="row">Dendengan Dalam, Lingk. I</td>
                <td>Paal Dua</td>
                <td>1.4827016516049476, 124.8567744425684</td>
                <td>
                  <span class="status rawan-tinggi">Rawan Tinggi</span>
                </td>
                <td>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal-id">
                    <i class="fal fa-eye"></i>
                    Detail
                  </button>
                </td>
              </tr>
              <tr>
                <td class="text-center" scope="row">Dendengan Dalam, Lingk. I</td>
                <td>Paal Dua</td>
                <td>1.4827016516049476, 124.8567744425684</td>
                <td>
                  <span class="status tidak-rawan">Tidak Rawan</span>
                </td>
                <td>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal-id">
                    <i class="fal fa-eye"></i>
                    Detail
                  </button>
                </td>
              </tr>
              <tr>
                <td class="text-center" scope="row">Dendengan Dalam, Lingk. I</td>
                <td>Paal Dua</td>
                <td>1.4827016516049476, 124.8567744425684</td>
                <td>
                  <span class="status rawan-sedang">Rawan Sedang</span>
                </td>
                <td>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal-id">
                    <i class="fal fa-eye"></i>
                    Detail
                  </button>
                </td>
              </tr>
              <tr>
                <td class="text-center" scope="row">Dendengan Dalam, Lingk. I</td>
                <td>Paal Dua</td>
                <td>1.4827016516049476, 124.8567744425684</td>
                <td>
                  <span class="status tidak-rawan">Tidak Rawan</span>
                </td>
                <td>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal-id">
                    <i class="fal fa-eye"></i>
                    Detail
                  </button>
                </td>
              </tr>
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

@push('addon-style')
  <style></style>
@endpush
@push('addon-script')
  <script></script>
@endpush