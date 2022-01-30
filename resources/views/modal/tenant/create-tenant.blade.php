<div class="modal fade" id="SubmitTenantForm" tabindex="-1" role="dialog" style="z-index: 1050, display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="title-tenant">Confirmation Data Submit Tenant</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.tenant.store') }}" enctype="multipart/form-data">
                @csrf

            <ul class="list-group">
                    <h5 class="font-size-14 mt-4"><i class="mdi mdi-file-upload text-primary"></i> Profile Tenant</h5>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="kode_tenant">Kode Tenant</label>
                                        <input id="kode_tenant_submit" name="kode_tenant_submit" type="text" class="form-control" value={{ $return_value }} readonly="true" />

                                    @if ($errors->has('kode_tenant_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('kode_tenant_submit') }}
                                        </p>
                                    @endif

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nama_pemilik">Nama Pemilik</label>
                                        <input id="nama_pemilik_submit" name="nama_pemilik_submit" type="text" class="form-control" placeholder="Masukan Nama Pemilik" value="{{ old('nama_pemilik_submit') }}" readonly="true"  required>

                                    @if ($errors->has('nama_pemilik_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('nama_pemilik_submit') }}
                                        </p>
                                    @endif

                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input id="email_submit" name="email_submit" type="email" class="form-control" value="{{ old('email_submit') }}" placeholder="Masukan Email" readonly="true" required>

                                    @if ($errors->has('email_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('email_submit') }}
                                        </p>
                                    @endif

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="no_telp">Nomor Telepon</label>
                                        <input id="no_telp_submit" name="no_telp_submit" type="text" class="form-control" value="{{ old('no_telp_submit') }}" placeholder="Masukan Nomor Telepon" readonly="true" required>

                                    @if ($errors->has('no_telp_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('no_telp_submit') }}
                                        </p>
                                    @endif

                                    </div>
                                </div>
                        </div>

                    <h5 class="font-size-14 mt-4"><i class="mdi mdi-file-upload text-primary"></i>Detail Bank</h5>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-pancard-input">Nama Bank</label>
                                        <input type="text" name="nama_bank_submit" class="form-control" id="nama_bank_submit" value="{{ old('nama_bank_submit') }}" placeholder="Masukan Nama Bank" readonly="true" required>

                                    @if ($errors->has('nama_bank_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('nama_bank_submit') }}
                                        </p>
                                    @endif

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-vatno-input">Nama Rekening</label>
                                        <input type="text" name="nama_rekening_submit" class="form-control" value="{{ old('nama_rekening_submit') }}" id="nama_rekening_submit" placeholder="Masukan Nama Rekening" readonly="true" required>

                                    @if ($errors->has('nama_rekening_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('nama_rekening_submit') }}
                                        </p>
                                    @endif
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-cstno-input">No Rekening</label>
                                    <input type="text" name="no_rekening_submit" class="form-control" id="no_rekening_submit" placeholder="Masukan No Rekening" value="{{ old('no_rekening_submit') }}" readonly="true" required>

                                    @if ($errors->has('no_rekening_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('no_rekening_submit') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    <h5 class="font-size-14 mt-4"><i class="mdi mdi-file-upload text-primary"></i>Detail Kantin</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-pancard-input">Nama Kantin</label>
                                <input type="text" name="nama_tenant_submit" class="form-control" id="nama_tenant_submit" value="{{ old('nama_tenant_submit') }}" placeholder="Masukan Nama Kantin" readonly="true" required>

                                    @if ($errors->has('nama_tenant_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('nama_tenant_submit') }}
                                        </p>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-vatno-input">Deskripsi Kantin</label>
                                <textarea class="form-control" name="desc_kantin_submit" id="desc_kantin_submit" value="{{ old('desc_kantin_submit') }}" readonly="true" required></textarea>

                                    @if ($errors->has('desc_kantin_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('desc_kantin_submit') }}
                                        </p>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-cstno-input">Lokasi Kantin</label>
                                <input type="text" name="lokasi_kantin_submit" class="form-control" id="lokasi_kantin_submit" value="{{ old('lokasi_kantin_submit') }}" placeholder="Masukan Nama Kantin" readonly="true" required>

                                    @if ($errors->has('lokasi_kantin_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('lokasi_kantin_submit') }}
                                        </p>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <h5 class="font-size-14 mt-4"><i class="mdi mdi-file-upload text-primary"></i>Detail Kantin</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-pancard-input">Jangka Waktu Kontrak</label>
                                <input type="number" name="jangka_waktu_kontrak_submit" class="form-control" id="jangka_waktu_kontrak_submit" value="{{ old('jangka_waktu_kontrak_submit') }}" placeholder="Masukan Jangka Waktu Kontrak" readonly="true" required>

                                    @if ($errors->has('jangka_waktu_kontrak_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('jangka_waktu_kontrak_submit') }}
                                        </p>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-vatno-input">Sharing Tel-U</label>
                                 <input type="number" name="sharing_telu_submit" class="form-control" id="sharing_telu_submit" value="{{ old('sharing_telu_submit') }}" placeholder="Masukan % Sharing" readonly="true" required>

                                    @if ($errors->has('sharing_telu_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('sharing_telu_submit') }}
                                        </p>
                                    @endif

                                </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="basicpill-vatno-input">Sharing Tenant</label>
                            <input type="number" name="sharing_tenant_submit" class="form-control" id="sharing_tenant_submit" value="{{ old('sharing_tenant_submit') }}" placeholder="Masukan % Sharing" readonly="true" required>

                            @if ($errors->has('sharing_tenant_submit'))
                                <p class="text-red-500 mb-3 text-sm">
                                    {{ $errors->first('sharing_tenant_submit') }}
                                </p>
                            @endif

                        </div>
                    </div>
                    <h5 class="font-size-14 mt-4"><i class="mdi mdi-file-upload text-primary"></i> Upload Dokumen</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3 mt-2">
                                <label for="kode_tenant">Qris Barcode</label>
                                <input class="form-control" type="file" id="qris_barcode_submit" name="qris_barcode_submit" required>
                                <span class="text-muted">File: jpg,jpeg,png, max size: 2mb</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 mt-2">
                                <label for="nama_pemilik">File Kontrak</label>
                                <input class="form-control" type="file" id="file_kontrak_submit" name="file_kontrak_submit" required>
                                <span class="text-muted">File: png, max size: 2mb</span>
                            </div>
                        </div>
                    </div>

                </ul>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </form>
            </div>

            </div>
        </div>
</div>
