@extends('layouts.app')

@section('title', 'Alat Berat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Alat Berat</h4>
    <div class="card">
        <div class="card-header">
            <h4>Data Alat Berat</h4>
            <form action="{{ route('Alat::import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" name="file" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" required="required">
                    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Import</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(count($alat) > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama alat</th>
                            <th>Utilisasi</th>
                            <th>Availability</th>
                            <th>Reliability</th>
                            <th>Idle</th>
                            <th>Jam Tersedia</th>
                            <th>Jam Operasi</th>
                            <th>Jam BDA</th>
                            <th>Jumlah BDA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alat as $a)
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>Belum ada data alat berat yang dimasukkan. Silahkan Admin melakukan import data terlebih dahulu.</p>
            @endif
        </div>
    </div>
</div>
@endsection