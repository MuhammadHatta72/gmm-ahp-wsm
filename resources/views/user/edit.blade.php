@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span>Edit User</h4>
    <div class="col-xl-12">
        <div class="card mb-4">
            <h5 class="card-header">Ubah data user</h5>
            <form action="{{ route('User::update', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" step="any" required="required" name="name"
                                value="{{ $user->name }}" id="html5-text-input" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-12">
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                id="html5-email-input" required="required"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="username" value="{{ $user->username }}"
                                id="html5-text-input" required="required"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Role</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                            name="role" required="required">
                            <option selected>Open this select menu</option>
                            <option value="admin" {{ ($user->role == 'admin') ? 'selected' : '' }}>admin</option>
                            <option value="teknik" {{ ($user->role == 'teknik') ? 'selected' : '' }}>teknik</option>
                            <option value="vendor" {{ ($user->role == 'vendor') ? 'selected' : '' }}>vendor</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection