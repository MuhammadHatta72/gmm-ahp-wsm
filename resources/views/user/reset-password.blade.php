@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span>Reset Password</h4>
    <div class="col-xl-12">
        <div class="card mb-4">
            @if(session('error-reset-password'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error-reset-password') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route('User::savePassword', $user->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new-password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection