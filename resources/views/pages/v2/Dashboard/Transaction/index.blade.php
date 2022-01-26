@extends('layouts.v2.app')


@section('title', 'Dashboard')

@section('title-content', 'Manajemen Transaksi')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

@include('modal.transactions.transaction-view')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Transaksi Pending</p>
                                    <h4 class="mb-0">{{ $transaction_pending }}</h4>
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
                                    <p class="text-muted fw-medium">Transaksi Sukses </p>
                                    <h4 class="mb-0">{{ $transaksi_sukses }}</h4>
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
                                    <p class="text-muted fw-medium">Total Transaksi</p>
                                    <h4 class="mb-0">{{ $total_transaction }}</h4>
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
                                    <h4 class="mb-0">{{ $transaction_day }}</h4>
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


            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-2">Data Transaction Smartcanteen</h4>

                        <div class="table-responsive mb-0 fixed-solution">
                            <table id="table-data" class="table table-bordered dt-responsive mt-2  nowrap w-100">
                                <thead class="table-light">
                                <tr>
                                    <th class="text-center">Kode Transaksi</th>
                                    <th class="text-center">Nama Pelanggan</th>
                                    <th class="text-center">Nama Pesanan</th>
                                    <th class="text-center">Tanggal Transaksi</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Detail</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div


@endsection

@push('after-script')
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js') }}" ></script>
    <script src="{{ url('https://cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js') }}"></script>

    <script>
        var t = $('#table-data').DataTable({
                    processing: true,
                    serverSide: true,
                    "order":[
                        [0, "asc"],
                        [1, "asc"],
                        [2, "asc"],
                        [3, "asc"],
                    ],
                    ajax:{
                        url: "{{ route('admin.transaction.index') }}"
                    },
                    columnDefs:[
                    {targets: '_all', visible: true},
                       {
                            "targets": 0,
                            "class": "text-sm",
                            data: "kode_transaksi",
                            name: "kode_transaksi"
                        },
                        {
                            "targets": 1,
                            "class": "text-sm",
                            data: 'nama_pelanggan',
                            name: 'nama_pelanggan'
                        },
                        {
                            "targets": 2,
                            "class": "text-sm",
                            data: "menu.name",
                            name: "menu.name"
                        },
                        {
                            "targets": 3,
                            "class": "text-sm",
                            data: "created_at",
                            name: "created_at",
                            render: function(data)
                            {
                                return moment(data).format('D MMM YYYY')
                            }

                        },
                        {
                            "targets": 4,
                            "class": "text-sm",
                            data: "status_order",
                            name: "status_order",
                            orderable: false,
                        },
                        {
                            "targets": 5,
                            "class": "text-sm",
                            data: "detail",
                            name: "detail",
                            orderable: false,
                        },
                        {
                            "targets": 6,
                            "class": "text-sm",
                            data: "action",
                            name: "action",
                            orderable: false,
                        }
                    ]

        })

        t.on('click', '#detail', function(){
            $tr = $(this).closest('tr');
                        if($($tr).hasClass('child')){
                            $tr = $tr.prev('.parent')
                        }

            var data = t.row($tr).data();
            var id = data.id


            $('#ModalView').modal('show')


            $.ajax({
                    url: '{{ route("admin.transaction.view") }}',
                    method: 'get',
                    data: {id:id},
                    success: function(res)
                    {
                        $.formattedDate = function(dateToFormat) {
                            var dateObject = new Date(dateToFormat);
                            var day = dateObject.getDate();
                            var month = dateObject.getMonth() + 1;
                            var year = dateObject.getFullYear();
                            day = day < 10 ? "0" + day : day;
                            month = month < 10 ? "0" + month : month;
                            var formattedDate = day + "-" + month + "-" + year;
                            return formattedDate;
                        };


                        var formattedDate = $.formattedDate(res.created_at);

                        $('#title-tenant').text('Detail Transaksi: ' + res.kode_transaksi )
                        $('#nama_pelanggan').text(res.nama_pelanggan)
                        $('#nim').text(res.nim)
                        $('#nama_menu').text(res.menu.name)
                        $('#nama_tenant').text(res.tenant.nama_tenant)
                        $('#status_pembelian').text(res.status)
                        $('#method_pembelian').text(res.method)
                        $('#jumlah_pembelian').text(res.quantity)
                        $('#total_harga').text(res.total)
                        $('#waktu_pembelian').text(formattedDate)

                        if(res.is_active == 1)
                        {
                            $('#status_tenant').text('Active')
                            $('#status_tenant').removeClass( "badge badge-pill badge-soft-danger font-size-11" ).addClass( "badge badge-pill badge-soft-success font-size-11" );

                        }else{
                                $('#status_tenant').text('Non-Active')
                                $('#status_tenant').removeClass( "badge badge-pill badge-soft-success font-size-11" ).addClass( "badge badge-pill badge-soft-danger font-size-11" );
                        }


                    }
                })
        })


        function closeModal()
        {
            $('#ModalView').modal('hide');
        }

    </script>

@endpush
