@extends('layouts.app')

@section('title', 'User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>User</h4>
    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
            <a href="{{ route('User::create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->role }}</td>

                            <td>
                            <form action="{{ route('User::destroy', $u->id) }}" method="post" class="d-inline" id="deleteForm{{ $u->id }}">
                                    <a href="{{ route('User::edit', $u->id) }}" class="btn btn-outline-info"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" data-bs-original-title="<span>Edit</span>"><i
                                            class="bx bx-edit-alt me-1"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" name="delete" class="btn btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" data-bs-original-title="<span>Delete</span>"
                                        onclick="showDeleteConfirmationModal('{{ $u->id }}')">
                                        <i class="bx bx-trash me-1"></i>
                                    </button>
                                    <a href="{{ route('User::resetPassword', $u->id) }}" class="btn btn-outline-warning" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                        data-bs-original-title="<span>Reset Password</span>"><i
                                            class="bx bx-reset me-1"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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