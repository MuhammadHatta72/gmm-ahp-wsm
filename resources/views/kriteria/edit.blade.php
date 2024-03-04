@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kriteria / </span>Edit Kriteria</h4>
    <div class="col-xl-12">
        <div class="card mb-4">
            <h5 class="card-header">Ubah data Kriteria</h5>
            <form action="{{ route('Kriteria::update', $kriteria->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Nama Kriteria</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" step="any" required="required" name="name"
                                value="{{ $kriteria->name }}" id="html5-text-input" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Role</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                            name="jenis" required="required">
                            <option selected>Open this select menu</option>
                            <option value="Benefit" {{ ($kriteria->jenis == 'Benefit') ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ ($kriteria->jenis == 'Cost') ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection