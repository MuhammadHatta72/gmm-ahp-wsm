@extends('layouts.app')

@section('title', 'Tambah Nilai')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bobot / </span>Tambah Nilai</h4>
    <div class="col-xl-12">
        <div class="card mb-4">
            <h5 class="card-header">Masukkan Nilai Perbandingan Berpasangan</h5>
        </div>

        <!-- Striped Rows -->
        <form action="{{ route('Bobot::store') }}" method="post">
            @csrf
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                @foreach($gmm_criteria as $index => $criteria)
                                <th>{{ $index }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <!-- idnex sould be [$index, $_index] -->
                            @php
                            $indexing = 0
                            @endphp

                            @foreach($gmm_criteria as $index => $criteria)
                            <tr>
                                <td>{{ $index }}</td>

                                @foreach($criteria as $_index => $_criteria)
                                <td>
                                    <input class="form-control" type="number" step="0.01" id="{{ $_criteria->id}}" name="{{ strtolower($index) }}[{{ $_criteria->id }}]" {{ $indexing > $_index ? 'disabled' : ''}} value="{{ $indexing == $_index ? '1.00' : '' }}" max="9.00" min="0.00" {{ $indexing == $_index ? 'readonly' : '' }} />
                                </td>
                                @endforeach

                                @php
                                $indexing = $indexing + 1
                                @endphp

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr class="dropdown-divider" />
                <div class="card-footer text-body-secondary">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <!--/ Striped Rows -->
    </div>
</div>
@endsection
