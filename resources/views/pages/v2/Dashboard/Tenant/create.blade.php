@extends('layouts.v2.app')

@section('title', 'Dashboard')

@section('title-content', 'Tambah Tenant')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')

    <div class="row">
            <div class="col-12">
                @include('modal.tenant.create-tenant')
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-2">Tambah Tenant Baru</h4>
                        <p class="card-title-desc">tolong isi semua data dibawah ini</p>

                        @include('components.v2.Dashboard.tenant.form')
            </div> <!-- end col -->
        </div>

@endsection

@push('after-script')

<script src="{{ asset('/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('/assets/js/pages/form-wizard.init.js') }}"></script>

<script>
    $(document).ready(function () {


        $('#Finish').on('click', function(){

            $('#SubmitTenantForm').modal('show')

            var kode_tenant = $('#kode_tenant').val();
            var nama_pemilik = $('#nama_pemilik').val();
            var email = $('#email').val();
            var no_telp = $('#no_telp').val();
            var nama_bank = $('#nama_bank').val();
            var nama_rekening = $('#nama_rekening').val();
            var no_rekening = $('#no_rekening').val();
            var nama_tenant = $('#nama_tenant').val();
            var desc_kantin = $('#desc_kantin').val();
            var lokasi_kantin = $('#lokasi_kantin').find(":selected").text();
            var jangka_waktu_kontrak = $('#jangka_waktu_kontrak').val();
            var sharing = $('#sharing').val();

            let _token   = $('meta[name="csrf-token"]').attr('content');

            $('#nama_pemilik_submit').val(nama_pemilik);
            $('#email_submit').val(email);
            $('#no_telp_submit').val(no_telp);
            $('#nama_bank_submit').val(nama_bank);
            $('#nama_rekening_submit').val(nama_rekening);
            $('#no_rekening_submit').val(no_rekening);
            $('#nama_tenant_submit').val(nama_tenant);
            $('textarea#desc_kantin_submit').val(desc_kantin);
            $('#lokasi_kantin_submit').val(lokasi_kantin)
            $('#jangka_waktu_kontrak_submit').val(jangka_waktu_kontrak);
            $('#sharing_submit').val(sharing);

        })
    })


</script>

@endpush
