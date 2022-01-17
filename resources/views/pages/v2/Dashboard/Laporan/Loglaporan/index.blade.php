@extends('layouts.v2.app')

@section('title', 'Log Laporan Transaksi')

@section('title-content', 'Log Laporan Transaksi')


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">
                        Activity Log Laporan
                    </h4>
                    <ul class="verti-timeline list-unstyled">
                        @foreach ($model as $key => $val )
                            <li class="event-list">
                                            <div class="event-timeline-dot">
                                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                                            </div>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <h5 class="font-size-14">{{ $val->tanggal }}<i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div>
                                                        Aktivitas download excel oleh {{ $val->name }}
                                                    </div>
                                                </div>
                                    </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection
