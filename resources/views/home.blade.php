@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Hai, {{ Auth::user()->name }}!</h5>
                                <p class="mb-4">
                                    Selamat datang di <span class="fw-bold">Sistem Pendukung Keputusan Perbaikan Alat
                                        Berat</span>
                                    untuk menetukan priotitas perbaikan alat.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('') }}assets/img/illustrations/man-with-laptop-light.png"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <button type="button" class="btn btn-icon btn-success" fdprocessedid="77t9u">
                                            <span class="tf-icons bx bx-arch"></span>
                                        </button>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Jumlah Alat Berat</span>
                                <h3 class="card-title mb-2">{{ \App\Models\Alat::count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <button type="button" class="btn btn-icon btn-info" fdprocessedid="77t9u">
                                            <span class="tf-icons bx bx-table"></span>
                                        </button>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Jumlah Kriteria</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $kriteria->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-6">
                            <h5 class="card-header m-0 me-2 pb-3">Data Alat Berat</h5>
                            {!! $alatChart->container() !!}
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-header m-0 me-2 pb-3">Data Kriteria</h5>
                            <div class="table-responsive p-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kriteria</th>
                                            <th>Jenis Kriteria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $k)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $k->name }}</td>
                                                <td>{{ $k->jenis }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-header m-0 me-2 pb-3">Rata-rata Utilisasi</h5>
                            {!! $utilisasiChart->container() !!}
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-header m-0 me-2 pb-3">Rata-rata Availability</h5>
                            {!! $availabilityChart->container() !!}
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-header m-0 me-2 pb-3">Rata-rata Reliability</h5>
                            {!! $reliabilityChart->container() !!}
                        </div>
                        <div class="col-md-3">
                            <h5 class="card-header m-0 me-2 pb-3">Rata-rata Idle</h5>
                            {!! $idleChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $alatChart->cdn() }}"></script>

    {{ $alatChart->script() }}
    {{ $utilisasiChart->script() }}
    {{ $availabilityChart->script() }}
    {{ $reliabilityChart->script() }}
    {{ $idleChart->script() }}
@endsection
