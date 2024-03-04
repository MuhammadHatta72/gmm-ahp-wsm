@extends('layouts.app')

@section('title', 'Bobot')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Bobot</h4>
    <div class="card">
        <div class="card-header">
            <h4>Perbandingan Berpasangan</h4>
            <a href="{{ route('Bobot::create') }}" class="btn btn-primary">+ Tambah Nilai</a>
        </div>
        <div class="card-body">
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

</script>