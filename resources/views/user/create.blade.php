@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span>Tambah User</h4>
    <div class="col-xl-12">
        <div class="card mb-4">
            <h5 class="card-header">Masukkan data user</h5>
            <form action="{{ route('User::store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-12">
                            <input name="name" class="form-control" type="text" id="name" placeholder="Masukkan nama" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-12">
                            <input name="email" class="form-control" type="email" id="email" placeholder="Masukkan email" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-12">
                            <input name="username" class="form-control" type="text" id="username" placeholder="Masukkan username" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-12">
                            <input name="password" class="form-control" type="password" id="password" value="password" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-select" id="role" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="admin">admin</option>
                            <option value="teknik">teknik</option>
                            <option value="vendor">vendor</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
