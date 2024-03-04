@extends('layouts.app')

@section('title', 'User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Kriteria</h4>
    <div class="card">
        <div class="card-header">
            <h4>Data Kriteria</h4>
            <a href="{{ route('Kriteria::create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(count($kriteria) > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Jenis Kriteria</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->name }}</td>
                            <td>{{ $k->jenis }}</td>
                            <td>
                            <form action="{{ route('Kriteria::destroy', $k->id) }}" method="post" class="d-inline" id="deleteForm{{ $k->id }}">
                                    <a href="{{ route('Kriteria::edit', $k->id) }}" class="btn btn-outline-info"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" data-bs-original-title="<span>Edit</span>"><i
                                            class="bx bx-edit-alt me-1"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" name="delete" class="btn btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" data-bs-original-title="<span>Delete</span>"
                                        onclick="showDeleteConfirmationModal('{{ $k->id }}')">
                                        <i class="bx bx-trash me-1"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p>Belum ada data kriteria yang dimasukkan. Silahkan lakukan input data kriteria.</p>
            @endif
        </div>
    </div>
</div>
@include('layouts.delete-confirm')
@endsection



<style>
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<script>
    function showDeleteConfirmationModal(formId) {
        var deleteForm = document.getElementById('deleteForm' + formId);
        if (deleteForm) {
            $('#deleteConfirmationModal').modal('show');
            document.getElementById('confirmDeleteButton').onclick = function () {
                deleteData(formId);
            };
        }
    }

    function deleteData(formId) {
        var deleteForm = document.getElementById('deleteForm' + formId);
        if (deleteForm) {
            deleteForm.submit();
        }
    }
</script>