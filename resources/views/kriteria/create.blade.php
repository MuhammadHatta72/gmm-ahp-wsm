@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kriteria / </span>Tambah Kriteria</h4>
    <div class="col-xl-12">
        <div class="card mb-4">
            <h5 class="card-header">Masukkan data kriteria</h5>
            <form action="{{ route('Kriteria::store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="col-md-2 col-form-label">Nama Kriteria</label>
                        <div class="col-md-12">
                            <input name="name" class="form-control" type="text" id="name" placeholder="Masukkan nama kriteria" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Kriteria</label>
                        <select name="jenis" class="form-select" id="jenis" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
