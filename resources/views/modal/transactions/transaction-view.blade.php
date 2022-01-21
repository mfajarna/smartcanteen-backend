<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="title-tenant"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h5 class="mb-2">Informasi Transaksi</h5>

                            <span class="mb-2 text-xs">
                                Nama Pelanggan :
                                <span class="text-dark font-weight-bold ms-sm-2" id="nama_pelanggan"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                NIM :
                                <span class="text-dark font-weight-bold ms-sm-2" id="nim"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Nama Menu :
                                <span class="text-dark font-weight-bold ms-sm-2" id="nama_menu"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Nama Tenant :
                                <span class="text-dark font-weight-bold ms-sm-2" id="nama_tenant"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Status Pembelian :
                                <span class="text-dark font-weight-bold ms-sm-2" id="status_pembelian"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Method Pembelian :
                                <span class="text-dark font-weight-bold ms-sm-2" id="method_pembelian"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Jumlah Pembelian:
                                <span class="text-dark font-weight-bold ms-sm-2" id="jumlah_pembelian"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Total Harga :
                                <span class="text-dark font-weight-bold ms-sm-2" id="total_harga"></span>
                            </span>
                            <span class="mb-2 text-xs">
                                Waktu Pembelian :
                                <span class="badge badge-pill badge-soft-success font-size-11" id="waktu_pembelian"></span>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-success text-gradient px-4 mb-0 mt-2 close-modal" onClick="closeModal()" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
