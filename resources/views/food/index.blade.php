<x-dashboard>
    {{
        dd($model)
    }}
      @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data List Menu Smart Canteen</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        {{-- <a class="btn btn-link text-success text-gradient px-3 mb-0 mt-2" href="javascript:;"><i class="fas fa-plus me-2"></i>Tambah</a>
                        <button class="btn btn-link text-success text-gradient px-3 mb-0 mt-2" id="button_nonaktif_all" onClick="editOnClick()" disabled><i class="fas fa-pencil-alt me-2"></i>Ubah</button> --}}
                        <button class="btn btn-link text-success text-gradient px-4 mb-0 mt-2" id="buttonview_nonaktif_all" onClick="viewOnClick()" disabled><i class="fas fa-eye me-2"></i>Lihat</button>
                        <button class="btn btn-link text-danger text-gradient px-4 mb-0 mt-2" id="buttondelete_nonaktif_all" onClick="hapusOnClick()" disabled><i class="fas fa-trash me-2"></i>Hapus</button>
                        <div class="table-responsive mt-1 px-2 p-0">
                            <table class="table align-items-center mb-0" id="table-data">
                                <thead>
                                  <tr>
                                    <th width="5%"><input type="checkbox" id="head-cb"></th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kode Menu</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Menu</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategori Menu</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Tenant</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                  </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('modal.menu.menu-view')
    @endsection
    @push('js')
        <script>
            let isChecked = 0;

            function viewOnClick()
            {
                let checkbox_terpilih = $('#table-data tbody .cb-child:checked');
                let id = []
                $.each(checkbox_terpilih, function(index, elm){
                    id.push(elm.value)
                })

                $('#ModalView').modal('show')

                $.ajax({
                    method: 'get',
                    url: '{{ route("menu.view") }}',
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
            }

            function closeModal()
            {
                $('#ModalView').modal('hide');
            }


            $(document).ready(function () {
                var t = $('#table-data').DataTable({
                    processing: true,
                    serverSide: true,
                     "order":[
                        [1, "asc"],
                        [2, "asc"],
                        [3, "asc"],
                        [4, "asc"],
                        [5, "asc"],
                    ],
                    ajax:{
                        url: "{{ route('menu-resource.index') }}"
                    },
                    columnDefs:[
                        {targets: '_all', visible: true},
                        {
                            "targets": 0,
                            "class": "text-center",
                                orderable: false,
                                "render": function(data, type, row, meta){
                                    return `<input type="checkbox" name="obat_checked[]"  class="cb-child" value="${row.id}">`;
                        }
                        },
                        {
                            "targets": 1,
                            "class": "text-sm",
                            data: "kode_menu",
                            name: "kode_menu"
                        },
                        {
                            "targets": 2,
                            "class": "text-sm",
                            data: 'name',
                            name: 'name'
                        },
                        {
                            "targets": 3,
                            "class": "text-sm",
                            data: "category",
                            name: "category"
                        },
                        {
                            "targets": 4,
                            "class": "text-sm",
                            data: "tenant.nama_tenant",
                            name: "tenant.nama_tenant"
                        },
                        {
                            "targets": 5,
                            "class": "text-sm",
                            data: "is_active",
                            name: "is_active"
                        },
                    ]
                })
                    $("#table-data tbody").on('click', '.cb-child', function(){
                    $('input.cb-child').not(this).prop('checked', false);
                    let isChecked = $("#table-data tbody .cb-child:checked");
                    let button_non_aktif_status = (isChecked.length>0);
                    $("#button_nonaktif_all").prop('disabled', !button_non_aktif_status);
                    $("#buttonview_nonaktif_all").prop('disabled', !button_non_aktif_status);
                    $("#buttondelete_nonaktif_all").prop('disabled', !button_non_aktif_status);
                    });
            });

        </script>
    @endpush
</x-dashboard>
