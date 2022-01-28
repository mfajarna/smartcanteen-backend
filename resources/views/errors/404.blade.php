
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>404 Not Found | Smartcanteen</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="{{ asset('/softui/img/logoBrand.png') }}">

{{-- csrf token --}}

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap Css -->
<link href="{{ asset('/assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"  />
<!-- App Css-->
<link href="{{ asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

<link href="{{ asset('/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />



<body>

<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                    <h4 class="text-uppercase">Sorry, page not found</h4>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.dashboard.index') }}">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div>
                    <img src="{{ asset('/assets/images/error-img.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>


</body>

</html>
