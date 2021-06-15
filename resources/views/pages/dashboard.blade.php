@extends('layouts.admin')
@section('title', 'Admin | Pemetaan Longsor')

@section('content')
<div class="main-content container-fluid">
  <div class="page-title mb-3">
    <h3>Data Keseluruhan</h3>
  </div>
  <section class="section">
    <div class="row mb-2">

      <div class="col-12">
        <div class="card card-statistic">
          <div class="card-body">
            <h6 class="card-subtitle mb-2 text-white">Data Daerah Rawan</h6>
            
            <div class="row justify-content-around">

              <div class="status-group col-12 col-md-4 d-flex align-items-center justify-content-center my-3">
                <div class="status-circle rounded-circle tidak-rawan"></div>
                <div>
                  <p class="text-white mb-0">Tidak Rawan</p>
                  <h2 class="text-white">
                    {{ $tidak_rawan }} <small>Lokasi ({{ number_format($trp, 2) }}%)</small>
                  </h2>
                </div>
              </div>
              <div class="status-group col-12 col-md-4 d-flex align-items-center justify-content-center my-3">
                <div class="status-circle rounded-circle rawan-sedang"></div>
                <div>
                  <p class="text-white mb-0">Rawan Sedang</p>
                  <h2 class="text-white">
                    {{ $rawan_sedang }} <small>Lokasi ({{ number_format($rsp, 2) }}%)</small>
                  </h2>
                </div>
              </div>
              <div class="status-group col-12 col-md-4 d-flex align-items-center justify-content-center my-3">
                <div class="status-circle rounded-circle rawan-tinggi"></div>
                <div>
                  <p class="text-white mb-0">Rawan Tinggi</p>
                  <h2 class="text-white">
                    {{ $rawan_tinggi }} <small>Lokasi ({{ number_format($rtp, 2) }}%)</small>
                  </h2>
                </div>
              </div>

            </div>

            <hr class="text-white">
            <div class="text-center">
              <a href="{{ route('data') }}" class="btn btn-default btn-detail rounded-pill">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection

@push('addon-style')
  <style></style>
@endpush
@push('addon-script')
  <script></script>
@endpush