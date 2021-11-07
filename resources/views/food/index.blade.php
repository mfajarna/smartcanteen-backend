<x-dashboard>
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
                        <button class="btn btn-link text-success text-gradient px-3 mb-0 mt-2" id="buttonview_nonaktif_all" onClick="viewOnClick()" disabled><i class="fas fa-eye me-2"></i>Lihat</button>
                        <button class="btn btn-link text-danger text-gradient px-3 mb-0 mt-2" id="buttondelete_nonaktif_all" onClick="hapusOnClick()" disabled><i class="fas fa-trash me-2"></i>Hapus</button>
                        <div class="table-responsive mt-1 px-2 p-0">
                            <table class="table align-items-center mb-0" id="table-data">
                                <thead>
                                  <tr>
                                    <th width="5%"><input type="checkbox" id="head-cb"></th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID </th>
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
    @endsection
</x-dashboard>
