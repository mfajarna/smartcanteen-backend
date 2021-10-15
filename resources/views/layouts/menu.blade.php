<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('softui') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('softui') }}/img/logoBrand.png">
    <title>{{ config('app.name', 'Smart Canteen Telkom University') }}</title>

      <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('softui') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('softui') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('softui') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('softui') }}/css/soft-ui-dashboard.css" rel="stylesheet" />



</head>
<body class="g-sidenav-show bg-gray-100">
    @include('layouts.sidenav.sidenav')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.topnav.topnav')
        <div class="container-fluid py-4">

          @include('layouts.footer.footer')
          </div>
    
    
        </main>

















    
    
    
      <script src="{{ asset('softui') }}/js/core/popper.min.js"></script>
    
      <script src="{{ asset('softui') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('softui') }}/js/plugins/smooth-scrollbar.min.js"></script>
      <script>
          var win = navigator.platform.indexOf('Win') > -1;
          if (win && document.querySelector('#sidenav-scrollbar')) {
              var options = {
                  damping: '0.5'
              }
              Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
          }
  
      </script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('softui') }}/js/soft-ui-dashboard.min.js"></script>
      @livewireScripts
    
</body>
</html>