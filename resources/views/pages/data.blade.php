@extends('layouts.admin')
@section('title', 'Admin | Pemetaan Longsor')

@section('content')
<div class="main-content container-fluid">
  <div class="page-title mb-3 d-flex align-items-center justify-content-between">
    <h3>Data Daerah Rawan</h3>
    <button class="btn icon icon-left btn-success round" data-toggle="modal" data-target="#tambahDataModal">
      <i class="fal fa-file-plus"></i>
      Tambah Data
    </button>
  </div>
  <section class="section">
    <div class="row mb-2">

      @if ($errors->any())
        <div class="col">
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover border text-center text-nowrap" id="dataTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Lokasi</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col" width="100px">Status</th>
                    <th scope="col" width="100px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td class="text-center" scope="row">{{ $item->nama_lokasi }}</td>
                      <td>{{ $item->kecamatan }}</td>
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
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <button type="button" class="btn icon btn-info" data-toggle="modal" data-target="#detailModal-{{ $item->id }}">
                            <i class="fal fa-eye" data-toggle="tooltip" title="Lihat Detail"></i>
                          </button>
                          <button type="button" class="btn icon btn-primary" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                            <i class="fal fa-edit" data-toggle="tooltip" title="Edit"></i>
                          </button>
                          <button type="button" class="btn icon btn-danger" data-toggle="modal" data-target="#hapusModal-{{ $item->id }}">
                            <i class="fal fa-trash-alt" data-toggle="tooltip" title="Hapus"></i>
                          </button>
                      </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
@include('includes.admin.modal')
@endsection

@push('addon-style')
  <style></style>
@endpush
@push('addon-script')
  <script></script>
@endpush