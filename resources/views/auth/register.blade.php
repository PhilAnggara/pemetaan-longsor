@extends('layouts.auth')
@section('title', 'Daftar | Pemetaan Longsor')

@section('content')
<div id="auth">

  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-12 mx-auto">
        <div class="card pt-4">
          <div class="card-body">
            <div class="text-center mb-5">
              <h3>
                <i class="fad fa-map-marked-alt brand-icon"></i>
                Pemetaan Longsor
              </h3>
              <p>Buat Akun</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group position-relative has-icon-left">
                <label for="name">Nama</label>
                <div class="position-relative">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
                  <div class="form-control-icon @error('name') invisible @enderror">
                    <i data-feather="user"></i>
                  </div>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group position-relative has-icon-left">
                <label for="email">Email</label>
                <div class="position-relative">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                  <div class="form-control-icon @error('email') invisible @enderror">
                    <i data-feather="mail"></i>
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                  <label for="password">Kata Sandi</label>
                </div>
                <div class="position-relative">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                  <div class="form-control-icon @error('password') invisible @enderror">
                    <i data-feather="lock"></i>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                  <label for="password-confirm">Konfirmasi Kata Sandi</label>
                </div>
                <div class="position-relative">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                  <div class="form-control-icon">
                    <i data-feather="lock"></i>
                  </div>
                </div>
              </div>

              <div class="clearfix mt-4">
                <button type="submit" class="btn btn-primary float-end">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('addon-style')
  <style></style>
@endpush
@push('addon-script')
  <script></script>
@endpush