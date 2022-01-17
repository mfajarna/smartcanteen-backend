<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        @include('includes.Dashboard.meta')

        <title>@yield('title') | SmartCanteen</title>

        @stack('before-style')

        @include('includes.Dashboard.style')

        @stack('after-style')
</head>

<body data-sidebar="dark">

        <div id="layout-wrapper">

            @include('components.v2.Dashboard.header-dekstop')

            <!-- ========== Left Sidebar Start ========== -->
            @include('components.v2.Dashboard.vertical-menu')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        @include('components.v2.Dashboard.breadcumb')

                         @include('sweetalert::alert')

                        @yield('content')

                    </div>
                </div>
            </div>

            @include('includes.Dashboard.footer');
        </div>

        @stack('before-script')

        @include('includes.Dashboard.script')

        @stack('after-script')

</body>
</html>
