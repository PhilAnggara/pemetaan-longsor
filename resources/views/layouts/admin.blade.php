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
  @include('includes.admin.style')
  @livewireStyles
  @stack('addon-style')

</head>
<body>

  <div id="app">

    @include('includes.admin.sidebar')

    <div id="main">

      @include('includes.admin.topbar')
      @yield('content')
      @include('includes.admin.footer')

    </div>
  </div>

  @stack('prepend-script')
  @include('includes.admin.script')
  @include('sweetalert::alert')
  @livewireScripts
  @stack('addon-script')

</body>
</html>