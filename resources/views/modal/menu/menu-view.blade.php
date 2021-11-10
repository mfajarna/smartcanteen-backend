<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="menu_title"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3 mt-4">
                        <img src="" class="avatar avatar-xxl me-3" width="200px" height="200px" id="img_makanan" class="rounded-image">
                    </div>
                    <div class="col-sm-8">
                        <ul class="list-group">
                            <li class="list-group-item border-0 mb-4"> 
                                <div class="d-flex flex-column">
                                    <h6 class="mb-2">Informasi Menu</h6>

                                    <span class="mb-2 text-xs">
                                        Nama Menu : 
                                        <span class="text-dark font-weight-bold ms-sm-2" id="nama_makanan"></span>
                                    </span>
                                    <span class="mb-2 text-xs">
                                        Kategori    : 
                                        <span class="text-dark font-weight-bold ms-sm-2" id="category"></span>
                                    </span>
                                    <span class="mb-2 text-xs">
                                        Bahan       : 
                                        <span class="text-dark font-weight-bold ms-sm-2" id="ingredients"></span>
                                    </span>
                                    <span class="mb-2 text-xs">
                                        Harga       : 
                                        <span class="text-dark font-weight-bold ms-sm-2" id="price"></span>
                                    </span>
                                    <span class="mb-2 text-xs">
                                        Rating      : 
                                        <span class="text-dark font-weight-bold ms-sm-2" id="rating"></span>
                                    </span>
                                    <span class="mb-2 text-xs">
                                        Nama Tenant : 
                                        <span class="text-dark font-weight-bold ms-sm-2" id="nama_tenant"></span>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-success text-gradient px-4 mb-0 mt-2 close-modal" onClick="closeModal()" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
</div>
