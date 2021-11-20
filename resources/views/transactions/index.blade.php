<x-dashboard>
    @section('content')
        <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Transaction Pending</p>
                    <h5 class="font-weight-bolder mb-0">
                      $53,000
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Transactions</p>
                    <h5 class="font-weight-bolder mb-0">
                      2,300
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Transactions (Day)</p>
                    <h5 class="font-weight-bolder mb-0">
                      +3,462
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Transactions Success</p>
                    <h5 class="font-weight-bolder mb-0">
                      $103
                      <span class="text-success text-sm font-weight-bolder">+5%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>List Transactions</h6>
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

    @endsection
</x-dashboard>
