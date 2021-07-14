<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/images/favicon.ico') }}">
  <title>
    @yield('title')
  </title>

  @stack('prepend-style')
  @include('includes.style')
  @livewireStyles
  @stack('addon-style')

</head>
<body>

  @include('includes.navbar')
  @yield('content')
  @include('includes.footer')
  @include('includes.modal')
  
  @stack('prepend-script')
  @include('includes.script')
  @include('sweetalert::alert')
  @livewireScripts
  @stack('addon-script')

</body>
</html>