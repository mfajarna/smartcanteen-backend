@extends('layouts.v2.app')

@section('title', 'Dashboard')

@section('title-content', 'Manajemen Tenant')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

        <div class="col mb-4">
            <button  id="buttonview_nonaktif_all" class="btn btn-dark waves-effect waves-light">
                <i class="mdi mdi-plus-box-multiple-outline align-middle me-1"></i> Tambah
            </button >
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-2">Data Menu Smartcanteen</h4>

                        <div class="table-responsive mb-0 fixed-solution">
                            <table id="table-data" class="table table-bordered dt-responsive mt-2  nowrap w-100">
                                <thead class="table-light">
                                <tr>
                                    <th class="text-center">Kode Tenant</th>
                                    <th class="text-center">Nama Tenant</th>
                                    <th class="text-center">Nama Pemilik</th>
                                    <th class="text-center">Lokasi Kantin</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


@endsection

@push('after-script')
    <script>
            var t = $('#table-data').DataTable({
                    processing: true,
                    serverSide: true,
                    "order":[
                        [0, "asc"],
                        [1, "asc"],
                        [2, "asc"],
                        [3, "asc"],
                        [4, "asc"],
                    ],
                    ajax:{
                        url: "{{ route('admin.tenant.index') }}"
                    },

                    columnDefs:[
                        {targets: '_all', visible: true},
                        {
                            "targets": 0,
                            "class": "text-sm",
                            data: "id_tenant",
                            name: "id_tenant"
                        },
                        {
                            "targets": 1,
                            "class": "text-sm",
                            data: 'nama_tenant',
                            name: 'nama_tenant'
                        },
                        {
                            "targets": 2,
                            "class": "text-sm",
                            data: "nama_pemilik",
                            name: "nama_pemilik"
                        },
                        {
                            "targets": 3,
                            "class": "text-sm",
                            data: "lokasi_kantin",
                            name: "lokasi_kantin"
                        },
                        {
                            "targets": 4,
                            "class": "text-sm",
                            data: "is_active",
                            name: "is_active",
                            render: function(data, type, full, meta)
                                {
                                    return '<span class="badge badge-pill badge-soft-success font-size-11">'+ data +'</span>'
                                }
                        },
                        {
                            "targets": 5,
                            "class": "text-sm",
                            data: "action",
                            name: "action",
                            orderable: false
                        },
                    ]
                });



    </script>
@endpush
