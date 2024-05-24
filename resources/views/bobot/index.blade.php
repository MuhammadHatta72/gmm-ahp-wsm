@extends('layouts.app')

@section('title', 'Bobot')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Nilai Kriteria</h4>
        <div class="card">
            <div class="card-header">
                <h4>Perbandingan Berpasangan</h4>
                @if (count($cekUser) < 1)
                    <a href="{{ route('Bobot::create') }}" class="btn btn-primary">+ Tambah Nilai</a>
                @endif
            </div>
            <div class="card-body">
                <x-SessionAlertComponent />
            </div>
        </div>

        @foreach ($bobot as $user_id => $grouped)
            @foreach ($grouped as $token => $_bobot)
                <x-BobotShowComponent :userId="$user_id" :token="$token" :bobot="$_bobot" :gmmCriteria="$gmm_criteria" />
            @endforeach
        @endforeach
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
    function showDeleteConfirmationModal(token) {
        var deleteForm = document.getElementById('deleteForm' + token);
        if (deleteForm) {
            $('#deleteConfirmationModal').modal('show');
            document.getElementById('confirmDeleteButton').onclick = function() {
                deleteData(token);
            };
        }
    }

    function deleteData(token) {
        var deleteForm = document.getElementById('deleteForm' + token);
        if (deleteForm) {
            deleteForm.submit();
        }
    }
</script>
