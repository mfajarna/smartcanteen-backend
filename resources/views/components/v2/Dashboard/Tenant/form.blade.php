<div id="basic-example">
        <h3>Profile Tenant</h3>
        <section>
            <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="kode_tenant">Kode Tenant</label>
                                <input id="kode_tenant" name="kode_tenant" type="text" class="form-control" value={{ $return_value }} disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input id="nama_pemilik" name="nama_pemilik" type="text" class="form-control" placeholder="Masukan Nama Pemilik" required>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Masukan Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_telp">Nomor Telepon</label>
                                <input id="no_telp" name="no_telp" type="text" class="form-control" placeholder="Masukan Nomor Telepon" required>
                            </div>
                        </div>
                    </div>

        </section>

        <h3>Detail Bank</h3>
            <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-pancard-input">Nama Bank</label>
                                        <input type="text" name="nama_bank" class="form-control" id="nama_bank" placeholder="Masukan Nama Bank" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-vatno-input">Nama Rekening</label>
                                        <input type="text" name="nama_rekening" class="form-control" id="nama_rekening" placeholder="Masukan Nama Rekening" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-cstno-input">No Rekening</label>
                                        <input type="text" name="no_rekening" class="form-control" id="no_rekening" placeholder="Masukan No Rekening" required>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </section>

            <h3>Detail Kantin</h3>
            <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-pancard-input">Nama Kantin</label>
                                <input type="text" name="nama_tenant" class="form-control" id="nama_tenant" placeholder="Masukan Nama Kantin" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-vatno-input">Deskripsi Kantin</label>
                                <textarea class="form-control" name="desc_kantin" id="desc_kantin"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-cstno-input">Lokasi Kantin</label>
                                <select class="form-select" id="lokasi_kantin">
                                            <option>-- Pilih Lokasi Kantin --</option>
                                            <option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
                                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                                            <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                                            <option value="Asrama Putra">Asrama Putra</option>
                                            <option value="Asrama Putri">Asrama Putri</option>
                                            <option value="Gedung Kuliah Umum">Gedung Kuliah Umum</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </section>

        <h3>Dokumen Kantin</h3>
            <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-pancard-input">Jangka Waktu Kontrak</label>
                                <input type="text" name="jangka_waktu_kontrak" class="form-control" id="jangka_waktu_kontrak" placeholder="Masukan Jangka Waktu Kontrak" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-vatno-input">% Sharing</label>
                                 <input type="text" name="sharing" class="form-control" id="sharing" placeholder="Masukan % Sharing" required>
                            </div>
                        </div>
                    </div>
                    <h5 class="font-size-14 mt-4"><i class="mdi mdi-file-upload text-primary"></i> Upload Dokumen</h5>

            </section>
            <h3>Confirm Detail</h3>
                <section>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                </div>
                                <div>
                                    <h5>Confirm Detail</h5>
                                    <p class="text-muted">Pastikan semua data sudah benar dan siap untuk disubmit!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</div>
