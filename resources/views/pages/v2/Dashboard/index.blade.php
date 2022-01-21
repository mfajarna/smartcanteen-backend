@extends('layouts.v2.app')

@section('title', 'Dashboard')

@section('title-content', 'Dashboard')

@section('content')

    <div class="row">

        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Smartcanteen</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ asset('assets/images/users/avatar-6.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-0 text-truncate"></p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">Last Login</h5>
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">IP Address</h5>
                                        <p class="text-muted mb-0">{{ $ip }}</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('profile.show') }}" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Saran dan Keluhan</h4>
                                <div class="text-center mb-4">
                            <div class="avatar-md mx-auto mb-4">
                                <div class="avatar-title bg-light rounded-circle text-primary h1">
                                    <i class="mdi mdi-email-open"></i>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <h4 class="text-primary">Kirim Pesan !</h4>
                                    <p class="text-muted font-size-14 mb-4">Kirim pesan saran dan keluhan tentang website dibawah ini</p>

                                    <form method="POST" action={{ route('admin.keluhan.store') }}>
                                        @csrf

                                    <div class="input-group bg-light rounded">
                                            <textarea  class="form-control bg-transparent border-0" name="keluhan"> </textarea>
                                    </div>


                                    <button class="btn btn-primary mt-2" type="submit" id="button-addon2">
                                        <i class="bx bxs-paper-plane"></i> Kirim Pesan
                                    </button>

                                    </form>

                                </div>
                            </div>
                        </div>

                         </div>
                        </div>

                </div>

        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="font-size-14"><i class="mdi mdi-warehouse text-primary"></i> Jumlah Tenant</h5>
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">All Tel-U</p>
                                    <h4 class="mb-0">{{ $jumlah_tenant }}</h4>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" style="position: relative;">
                        <div class="d-sm-flex flex-wrap">
                                    <h4 class="card-title mb-4">Per Canteen</h4>
                                    <div class="ms-auto">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Week</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Month</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                         </div>

                        <div id="chart">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





@endsection

@push('after-script')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
          series: [{
          name: 'Jumlah Tenant',
          data: {!! json_encode($dataFinal) !!}
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['FIT', 'FK', 'FEB', 'AsramaPutra', 'AsramaPutri', 'GKU'],
        },
        yaxis: {
          title: {
            text: 'Jumlah Tenant'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
