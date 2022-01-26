@extends('layouts.v2.app')


@section('title', 'Laporan Transaksi')

@section('title-content', 'Laporan Transaksi')

@push('after-style')

    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/assets/libs/@chenfengyuan/datepicker/datepicker.min.css') }}">

@endpush

@section('content')

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Transaksi</p>
                                        <h4 class="mb-0">{{ $total_transaction }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bxs-cart font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Penjualan</p>
                                        <h4 class="mb-0">{{ $total_penjualan[0]['total_penjualan'] == NULL ? 0 : $total_penjualan[0]['total_penjualan'] }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bxs-cart font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Pemasukan/ Hari</p>
                                        <h4 class="mb-0">{{ $total_pemasukan[0]['total_pemasukan'] == NULL ? "Rp. 0" : "Rp " . number_format($total_pemasukan[0]['total_pemasukan'], 0, '.', '.')
                                        }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bxs-cart font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Transaksi / Hari</p>
                                        <h4 class="mb-0">{{ $total_transactionday[0]['transaksi_perhari'] }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bxs-cart font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title mb-2">Filter Range Tanggal Laporan Transaksi</h4>

                                    <div class="row mt-4">
                                        {{-- <div class="mb-3 col-lg-2">
                                            <label for="example-datetime-local-input">Range Tanggal Awal</label>
                                            <input class="form-control" type="date" id="tgl_awal">
                                        </div> --}}
                                        {{-- <div class="mb-3 col-lg-2">
                                            <label for="example-datetime-local-input">Range Tanggal Akhir</label>
                                            <input class="form-control" type="date"  id="tgl_akhir">
                                        </div> --}}
                                        <div class="col-xl-6 mb-4">
                                            <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                                    <input type="text" class="form-control" id="tgl_awal" placeholder="Start Date">
                                                    <input type="text" class="form-control" id="tgl_akhir" placeholder="End Date">

                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-4">

                                                <a id="btn_export" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> EXCEL
                                                </a>

                                                <a id="btn_csv" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> CSV
                                                </a>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div> <!-- end col -->


                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Filter Daily Laporan Transaksi</h4>

                                <div class="row mt-4">
                                        <div class="col-xl-6 mb-4">
                                            <div class="position-relative" id="datepicker1">
                                                <input type="text" class="form-control" id="daily_tanggal" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-4">

                                                <a id="btn_export_daily" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> EXCEL
                                                </a>

                                                <a id="btn_csv_daily" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> CSV
                                                </a>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Filter Month Laporan Transaksi</h4>

                                <div class="row mt-4">
                                        <div class="col-xl-6 mb-4">
                                            <div class="position-relative" id="datepicker2">

                                                <input type="text" class="form-control" data-date-container="#datepicker2" placeholder="MM yyyy" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-4">

                                                <a id="btn_export" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> EXCEL
                                                </a>

                                                <a id="btn_csv" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> CSV
                                                </a>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Filter Year Laporan Transaksi</h4>

                                <div class="row mt-4">
                                        <div class="col-xl-6 mb-4">
                                            <div class="position-relative" id="datepicker5">

                                                <input type="text" class="form-control" data-provide="datepicker"  placeholder="dd M, yyyy" data-date-container="#datepicker5" data-date-format="dd M, yyyy" data-date-min-view-mode="2">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-4">

                                                <a id="btn_export" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> EXCEL
                                                </a>

                                                <a id="btn_csv" target="_blank" class="btn btn-success waves-effect waves-light">
                                                    <i class="mdi mdi-file-excel  align-middle me-1"></i> CSV
                                                </a>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                        <div class="card">

                        </div>
                    </div>
                </div>
                <div class="col-6">
                        <div class="card">

                        </div>
                    </div>
                </div>
                 <div class="col-6">
                        <div class="card">

                        </div>
                    </div>
                </div>
                <div class="col-6">
                        <div class="card">

                        </div>
                    </div>
                </div>

                <div class="col-6">
                        <div class="card">

                        </div>
                    </div>
                </div>

            </div> <!-- end col -->
        </div>

@endsection

@push('after-script')
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js') }}" ></script>
        <script src="{{ url('https://cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js') }}"></script>

        <script src="{{ asset('/assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('/assets/js/pages/form-advanced.init.js') }}"></script>
        <script src="{{ asset('/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>

        <script>
            $(document).ready(function () {

                // jquery range tanggal
                $('#btn_export').on('click', function(){

                var tgl_awal = $('#tgl_awal').val();
                var tgl_akhir = $('#tgl_akhir').val();

                    if(tgl_awal != "" && tgl_akhir != "")
                    {
                        location.href='/admin/laporan_export/'+ tgl_awal + '/' + tgl_akhir

                        $.ajax({
                            url: "{{ route('admin.laporan.sendlog')}}",
                            method: "GET",
                            success:function(res)
                            {

                            }
                        })

                    }else{
                        alert('Tolong isi filter tanggal!')
                    }

                })

                // jquery daily tanggal
                $('#btn_export_daily').on('click', function(){
                    var tanggal = $('#daily_tanggal').val();

                    if(tanggal != "")
                    {

                    }else{
                        alert("Tolong isi filter tanggal daily!")
                    }
                })

                $('#btn_csv').on('click', function(){

                var tgl_awal = $('#tgl_awal').val();
                var tgl_akhir = $('#tgl_akhir').val();

                    if(tgl_awal != "" && tgl_akhir != "")
                    {
                        location.href='/admin/laporan_csv/'+ tgl_awal + '/' + tgl_akhir

                        $.ajax({
                            url: "{{ route('admin.laporan.sendlog')}}",
                            method: "GET",
                            success:function(res)
                            {

                            }
                        })

                    }else{
                        alert('Tolong isi filter tanggal!')
                    }

                })
            })


        </script>
@endpush
