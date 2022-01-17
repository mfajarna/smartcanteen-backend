@extends('layouts.v2.app')

@section('title', 'Dashboard')

@section('title-content', 'Manajemen Menu')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

        {{-- Button View --}}
        <div class="col mb-4">
            <button  id="buttonview_nonaktif_all" class="btn btn-dark waves-effect waves-light">
                <i class="mdi mdi-eye-check  align-middle me-1"></i> Lihat
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
                                    <th class="text-center">Kode Menu</th>
                                    <th class="text-center">Nama Menu</th>
                                    <th class="text-center">Kategori Menu</th>
                                    <th class="text-center">Nama Tenant</th>
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
        @include('modal.menu.menu-view')
@endsection

@push('after-script')
    <script>

        $(document).ready(function () {
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
                        url: "{{ route('admin.menu.index') }}"
                    },
                    columnDefs:[
                        {targets: '_all', visible: true},
                        {
                            "targets": 0,
                            "class": "text-sm",
                            data: "kode_menu",
                            name: "kode_menu"
                        },
                        {
                            "targets": 1,
                            "class": "text-sm",
                            data: 'name',
                            name: 'name'
                        },
                        {
                            "targets": 2,
                            "class": "text-sm",
                            data: "category",
                            name: "category"
                        },
                        {
                            "targets": 3,
                            "class": "text-sm",
                            data: "tenant.nama_tenant",
                            name: "tenant.nama_tenant"
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
                            data: "detail",
                            name: "detail",
                            orderable: false
                        },
                        {
                            "targets": 6,
                            "class": "text-sm",
                            data: "action",
                            name: "action",
                            orderable: false
                        }
                    ]
                })

                t.on('click', '#detail', function(){
                    $tr = $(this).closest('tr');
                        if($($tr).hasClass('child')){
                            $tr = $tr.prev('.parent')
                        }

                    var data = t.row($tr).data();
                    var id = data.id;

                     $('#ModalView').modal('show')

                $.ajax({
                    method: 'get',
                    url: '{{ route("admin.menu.view") }}',
                    data: {id:id},
                    success: function(res)
                    {
                        var price = res[0].price
                        var rupiah = (price/1000).toFixed(3)

                        $("#menu_title").text('Kode Menu: '+ res[0].kode_menu);
                        $("#img_makanan").attr("src", res[0].picturePath)
                        $('#nama_makanan').text(res[0].name)
                        $('#category').text(res[0].category)
                        $('#ingredients').text(res[0].ingredients)
                        $('#price').text('Rp. ' + rupiah)
                        $('#rating').text(res[0].rating)
                        $('#nama_tenant').text(res[0].tenant.nama_tenant)
                    }
                })
                })


                function closeModal()
                    {
                        $('#ModalView').modal('hide');
                    }

            });
    </script>
@endpush

