<x-dashboard>
    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data List Tenant Smart Canteen</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        {{-- <a class="btn btn-link text-success text-gradient px-3 mb-0 mt-2" href="javascript:;"><i class="fas fa-plus me-2"></i>Tambah</a>
                        <button class="btn btn-link text-success text-gradient px-3 mb-0 mt-2" id="button_nonaktif_all" onClick="editOnClick()" disabled><i class="fas fa-pencil-alt me-2"></i>Ubah</button> --}}
                        <button class="btn btn-link text-success text-gradient px-4 mb-0 mt-2" id="buttonview_nonaktif_all" onClick="viewOnClick()"  disabled><i class="fas fa-eye me-2"></i>Lihat</button>
                        <button class="btn btn-link text-danger text-gradient px-4 mb-0 mt-2" id="buttondelete_nonaktif_all" onClick="hapusOnClick()" disabled><i class="fas fa-trash me-2"></i>Hapus</button>
                        <div class="table-responsive mt-1 px-2 p-0">
                            <table class="table align-items-center mb-0" id="table-data">
                                <thead>
                                  <tr>
                                    <th width="5%"><input type="checkbox" id="head-cb"></th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kode Tenant</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Tenant</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Pemilik</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lokasi Kantin</th>
                                  </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @include('modal.tenant.tenant-view') --}}
        <div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="title-tenant"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Nama Tenant</p>
                        <h6 class="font-weight-bolder mb-0" id="nama_tenant"> </h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Nama Pemilik</p>
                        <h6 class="font-weight-bolder mb-0" id="nama_pemilik"> </h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No Telepon</p>
                        <h6 class="font-weight-bolder mb-0" id="no_telp"> </h6>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Lokasi Kantin</p>
                        <h6 class="font-weight-bolder mb-0" id="lokasi_kantin"> </h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Deskripsi Kantin</p>
                        <h6 class="font-weight-bolder mb-0" id="desc_kantin"> </h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Jenis Bank</p>
                        <h6 class="font-weight-bolder mb-0" id="jenis_bank"> </h6>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No Rekening</p>
                        <h6 class="font-weight-bolder mb-0" id="no_rekening"> </h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Nama Rekening</p>
                        <h6 class="font-weight-bolder mb-0" id="nama_rekening"> </h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Status Tenant</p>
                        <h6 class="font-weight-bolder mb-0" id="status"> </h6>
                    </div>
                </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-success text-gradient px-4 mb-0 mt-2 close-modal" onClick="closeModal()" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

    @endsection

    @push('js')
        <script>
            let isChecked = 0;

            function viewOnClick(){
                let checkbox_terpilih = $('#table-data tbody .cb-child:checked');
                let id = []
                $.each(checkbox_terpilih, function(index, elm){
                    id.push(elm.value)
                })

                $('#ModalView').modal('show')

                $.ajax({
                    url: '{{ route("tenant.view") }}',
                    method: 'get',
                    data: {id:id},
                    success: function(res)
                    {
                        $('#title-tenant').text('Tenant Kode: ' + res[0].id_tenant )
                        $('#nama_tenant').text(res[0].nama_tenant)
                        $('#nama_pemilik').text(res[0].nama_pemilik)
                        $('#no_telp').text(res[0].no_telp)
                        $('#lokasi_kantin').text(res[0].lokasi_kantin)
                        $('#desc_kantin').text(res[0].desc_kantin)
                        $('#jenis_bank').text(res[0].nama_bank)
                        $('#no_rekening').text(res[0].no_rekening)
                        $('#nama_rekening').text(res[0].nama_rekening)
                        $('#status').text(res[0].status)

                    }
                })
            }

            function closeModal()
            {
                $('#ModalView').modal('hide');
            }

            $(document).ready(function(){

                var t = $('#table-data').DataTable({
                    processing: true,
                    serverSide: true,
                    "order":[
                        [1, "asc"],
                        [2, "asc"],
                        [3, "asc"],
                    ],
                    ajax:{
                        url: "{{ route('tenant-user.index') }}"
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
                            data: "id_tenant",
                            name: "id_tenant"
                        },
                        {
                            "targets": 2,
                            "class": "text-sm",
                            data: 'nama_tenant',
                            name: 'nama_tenant'
                        },
                        {
                            "targets": 3,
                            "class": "text-sm",
                            data: "nama_pemilik",
                            name: "nama_pemilik"
                        },
                        {
                            "targets": 4,
                            "class": "text-sm",
                            data: "lokasi_kantin",
                            name: "lokasi_kantin"
                        }
                    ]
                });

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
