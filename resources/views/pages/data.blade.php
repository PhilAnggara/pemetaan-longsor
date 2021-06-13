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
                  <tr>
                    <td class="text-center" scope="row">Dendengan Dalam, Lingk. I</td>
                    <td>Paal Dua</td>
                    <td>
                      <span class="status rawan-sedang">Rawan Sedang</span>
                    </td>
                    <td>
                      <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <button type="button" class="btn icon btn-info" data-toggle="modal" data-target="#detailModal-id">
                          <i class="fal fa-eye" data-toggle="tooltip" title="Lihat Detail"></i>
                        </button>
                        <button type="button" class="btn icon btn-primary" data-toggle="modal" data-target="#editModal-id">
                          <i class="fal fa-edit" data-toggle="tooltip" title="Edit"></i>
                        </button>
                        <button type="button" class="btn icon btn-danger" data-toggle="modal" data-target="#hapusModal-id">
                          <i class="fal fa-trash-alt" data-toggle="tooltip" title="Hapus"></i>
                        </button>
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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