@extends('layouts.app')

@section('title', 'Alat Berat')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Alat Berat</h4>
        @if (in_array(request()->user()->role, ['admin', 'teknik']))
            <div class="card">
                <div class="card-header">
                    <h4>Form Import Data</h4>
                    @if (request()->user()->role == 'admin')
                        <form action="{{ route('Alat::import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload" required="required">
                                <button class="btn btn-outline-primary" type="submit"
                                    id="inputGroupFileAddon04">Import</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        @endif

        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Data Alat Berat</h4>
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="month" class="form-control" name="month" value="{{ request('month') }}">
                            <button class="btn btn-outline-primary" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (count($alat) > 0)
                    <table class="table table-bordered" width="100%" style="table-layout: fixed">
                        <thead>
                            <tr>
                                <th width="7%">No</th>
                                <th width="10%">Kode</th>
                                <th width="20%">Nama alat</th>
                                <th>Utilisasi</th>
                                <th>Availability</th>
                                <th>Reliability</th>
                                <th>Idle</th>
                                <th>Jam Tersedia</th>
                                <th>Jam Operasi</th>
                                <th>Jam BDA</th>
                                <th>Jumlah BDA</th>
                                <th width="10%">Update Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alat as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->kode }}</td>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->utilisasi }}</td>
                                    <td>{{ $a->availability }}</td>
                                    <td>{{ $a->reliability }}</td>
                                    <td>{{ $a->jam_operasi }}</td>
                                    <td>{{ $a->idle }}</td>
                                    <td>{{ $a->jam_tersedia }}</td>
                                    <td>{{ $a->jam_bda }}</td>
                                    <td>{{ $a->jumlah_bda }}</td>
                                    <td>{{ $a->updated_at ?? $a->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Belum ada data alat berat yang dimasukkan. Silahkan Admin melakukan import data terlebih dahulu.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
