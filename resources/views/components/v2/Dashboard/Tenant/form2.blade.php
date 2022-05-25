<div class="checkout-tabs" data-select2-id="14">
    <div class="row">
        <div class="col-xl-2 col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                    <i class="bx bx-info-circle d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Profile Tenant</p>
                </a>
                <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false"> 
                    <i class="bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Detail Bank</p>
                </a>
                <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir" role="tab" aria-controls="v-pills-confir" aria-selected="false">
                    <i class="bx bxs-user-detail d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Detail Kantin</p>
                </a>

                <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">
                    <i class="bx bx-file-blank d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Document Kantin</p>
                </a>
            </div>
        </div>
        <div class="col-xl-10 col-sm-9" data-select2-id="13">
            <div class="card" data-select2-id="12">
                <div class="card-body" data-select2-id="11">
                    <div class="tab-content" id="v-pills-tabContent" data-select2-id="v-pills-tabContent">
                        
                        <div class="tab-pane fade active show" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab" data-select2-id="v-pills-shipping">
                            <div data-select2-id="10">
                                <h4 class="card-title">Tenant information</h4>
                                <p class="card-title-desc">Fill all information below</p>
                                <form method="POST" action="{{ route('admin.tenant.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Error</strong> - {{ $error }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                    @endforeach
            
                                    @endif

                                    
                                    <div class="form-group row mb-4">
                                        <label for="billing-name" class="col-md-2 col-form-label">Kode Tenant</label>
                                        <div class="col-md-10">
                                            <input id="kode_tenant_submit" name="kode_tenant_submit" type="text" class="form-control" value={{ $return_value }} readonly="true"  />
                                            @if ($errors->has('kode_tenant_submit'))
                                                    <p class="text-red-500 mb-3 text-sm">
                                                        {{ $errors->first('kode_tenant_submit') }}
                                                    </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label for="billing-email-address" class="col-md-2 col-form-label">Nama Pemilik</label>
                                        <div class="col-md-10">
                                            <input id="nama_pemilik_submit" name="nama_pemilik_submit" type="text" class="form-control" placeholder="Masukan Nama Pemilik" value="{{ old('nama_pemilik_submit') }}"  required>

                                            @if ($errors->has('nama_pemilik_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('nama_pemilik_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Email Pemilik</label>
                                        <div class="col-md-10">
                                            <input id="email_submit" name="email_submit" type="email" class="form-control" value="{{ old('email_submit') }}" placeholder="Masukan Email" required>

                                            @if ($errors->has('email_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('email_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label for="billing-address" class="col-md-2 col-form-label">No Telepon</label>
                                        <div class="col-md-10">
                                            <input id="no_telp_submit" name="no_telp_submit" type="number" class="form-control" value="{{ old('no_telp_submit') }}" placeholder="Masukan Nomor Telepon"  required>

                                            @if ($errors->has('no_telp_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('no_telp_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                                               
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                            <div>
                                <h4 class="card-title">Detail Bank</h4>
                                <p class="card-title-desc">Fill all information below</p>
                            
                                <div class="form-group row mb-4">
                                    <label for="billing-phone" class="col-md-2 col-form-label">Nama Bank</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_bank_submit" class="form-control" id="nama_bank_submit" value="{{ old('nama_bank_submit') }}" placeholder="Masukan Nama Bank" required>
                                
                                        @if ($errors->has('nama_bank_submit'))
                                            <p class="text-red-500 mb-3 text-sm">
                                                {{ $errors->first('nama_bank_submit') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="billing-phone" class="col-md-2 col-form-label">Nama Rekening</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_rekening_submit" class="form-control" value="{{ old('nama_rekening_submit') }}" id="nama_rekening_submit" placeholder="Masukan Nama Rekening" required>
                                
                                        @if ($errors->has('nama_rekening_submit'))
                                            <p class="text-red-500 mb-3 text-sm">
                                                {{ $errors->first('nama_rekening_submit') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="billing-phone" class="col-md-2 col-form-label">No Rekening</label>
                                    <div class="col-md-10">
                                        <input type="text" name="no_rekening_submit" class="form-control" id="no_rekening_submit" placeholder="Masukan No Rekening" value="{{ old('no_rekening_submit') }}" required>
                                
                                        @if ($errors->has('no_rekening_submit'))
                                            <p class="text-red-500 mb-3 text-sm">
                                                {{ $errors->first('no_rekening_submit') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                

                             </div>
                        </div>
                        
                        <div class="tab-pane fade" id="v-pills-confir" role="tabpanel" aria-labelledby="v-pills-confir-tab">

                                    <h4 class="card-title">Detail Kantin</h4>
                                    <p class="card-title-desc">Fill all information below</p>

                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Nama Kantin</label>
                                        <div class="col-md-10">
                                            <input type="text" name="nama_tenant_submit" class="form-control" id="nama_tenant_submit" value="{{ old('nama_tenant_submit') }}" placeholder="Masukan Nama Kantin" required>

                                            @if ($errors->has('nama_tenant_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('nama_tenant_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Deskripsi Kantin</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="desc_kantin_submit" id="desc_kantin_submit" value="{{ old('desc_kantin_submit') }}" required></textarea>

                                            @if ($errors->has('desc_kantin_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('desc_kantin_submit') }}
                                                </p>
                                            @endif

                                            
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Lokasi Kantin</label>
                                        <div class="col-md-10">
                                            <select class="form-select" id="lokasi_kantin_submit" name="lokasi_kantin_submit">
                                                <option>-- Pilih Lokasi Kantin --</option>
                                                <option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
                                                <option value="Fakultas Teknik">Fakultas Teknik</option>
                                                <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                                                <option value="Asrama Putra">Asrama Putra</option>
                                                <option value="Asrama Putri">Asrama Putri</option>
                                                <option value="Gedung Kuliah Umum">Gedung Kuliah Umum</option>
                                            </select>

                                            @if ($errors->has('lokasi_kantin_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('lokasi_kantin_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Jangka Waktu Kontrak</label>
                                        <div class="col-md-10">
                                            <input type="number" name="jangka_waktu_kontrak_submit" class="form-control" id="jangka_waktu_kontrak_submit" value="{{ old('jangka_waktu_kontrak_submit') }}" placeholder="Masukan Jangka Waktu Kontrak" required>
                                            <span class="text-muted">*Isikan dalam format bulan</span>
                                            @if ($errors->has('jangka_waktu_kontrak_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('jangka_waktu_kontrak_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Sharing Tel-U</label>
                                        <div class="col-md-10">
                                            <input type="number" name="sharing_telu_submit" class="form-control" id="sharing_telu_submit" value="{{ old('sharing_telu_submit') }}" placeholder="Masukan % Sharing" required>
                                            <span class="text-muted">*Isikan dalam format persen, contoh: 80</span>

                                            @if ($errors->has('sharing_telu_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('sharing_telu_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Sharing Tenant</label>
                                        <div class="col-md-10">
                                            <input type="number" name="sharing_tenant_submit" class="form-control" id="sharing_tenant_submit" value="{{ old('sharing_tenant_submit') }}" placeholder="Masukan % Sharing" required>

                                            @if ($errors->has('sharing_tenant_submit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('sharing_tenant_submit') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                        </div>

                        <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-confir-tab">
                            <h4 class="card-title">Dokumen & Contact Term Kantin</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <div class="form-group row mb-4">
                                <label for="billing-phone" class="col-md-2 col-form-label">File Qris Barcode</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" id="qris_barcode_submit" name="qris_barcode_submit" required>
                                    <span class="text-muted">File: jpg,jpeg,png, max size: 2mb</span>
                               
                                    @if ($errors->has('qris_barcode_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('qris_barcode_submit') }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="billing-phone" class="col-md-2 col-form-label">File Kontrak</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" id="file_kontrak_submit" name="file_kontrak_submit" required>
                                    <span class="text-muted">File: pdf, max size: 2mb</span>
                               
                                    @if ($errors->has('file_kontrak_submit'))
                                        <p class="text-red-500 mb-3 text-sm">
                                            {{ $errors->first('file_kontrak_submit') }}
                                        </p>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label for="billing-phone" class="col-md-2 col-form-label">Contact Term</label>
                                <div class="col-md-10">
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                        <input type="text" class="form-control" name="tanggal_dari_terms" placeholder="Tanggal Dari">
                                        <input type="text" class="form-control" name="sampai_tanggal_terms" placeholder="Sampai Tanggal">
                                    </div>
                                </div>
                            </div>



                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{ route('admin.tenant.index') }}" class="btn text-muted d-none d-sm-inline-block btn-link">
                                        <i class="mdi mdi-arrow-left me-1"></i> Back to List Tenant </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                    
                                    </div>
                                </div>
                                
                                </form><!-- end col -->
                            </div>


                        </div>

                    </div>
                </div>
            </div>
 <!-- end row -->
        </div>
    </div>
</div>