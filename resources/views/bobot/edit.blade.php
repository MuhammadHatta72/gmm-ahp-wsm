@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bobot / </span>Edit Nilai</h4>
        <div class="col-xl-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Nilai Perbandingan Berpasangan</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">No.</th>
                            <th rowspan="2">Keterangan</th>
                            <th colspan="2">Nilai</th>
                        </tr>
                        <tr>
                            <th>Penting</th>
                            <th>Tidak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Kedua elemen sama pentingnya</td>
                            <td>1</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Elemen yang satu sedikit lebih penting daripada elemen yang lainnya</td>
                            <td>3</td>
                            <td>0,33</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Elemen yang satu lebih penting daripada elemen yang lainnya</td>
                            <td>5</td>
                            <td>0,20</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Satu elemen jelas lebih mutlak penting daripada elemen lainnya</td>
                            <td>7</td>
                            <td>0,14</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Satu elemen mutlak penting daripada elemen lainnya</td>
                            <td>9</td>
                            <td>0,11</td>
                        </tr>
                        <tr>
                            <td rowspan="4">6.</td>
                            <td rowspan="4">Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang berdekatan</td>
                            <td>2</td>
                            <td>0,50</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>0,25</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>0,17</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>0,13</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Striped Rows -->
            <form action="{{ route('Bobot::update', $bobots->first()->rand_token) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @foreach ($gmm_criteria as $index => $criteria)
                                        <th>{{ $index }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $indexing = 0;
                                @endphp

                                {{-- @foreach ($gmm_criteria as $index => $criteria)
                                    <tr>
                                        <td>{{ $index }}</td>

                                        @foreach ($criteria as $_index => $_criteria)
                                            @php
                                                $bobot_nilai = $bobots->firstWhere('id_kriteria', $_criteria->id);
                                            @endphp
                                            <td>
                                                <x-SelectInputBobot id="{{ $_criteria->id }}"
                                                    name="{{ strtolower($index) }}[{{ $_criteria->id }}]"
                                                    dvalue="{{ $bobot_nilai ? $bobot_nilai->bobot : 0 }}"
                                                    readonly="{{ $indexing == $_index }}"
                                                    disabled="{{ $indexing > $_index }}" />
                                            </td>
                                        @endforeach

                                        @php
                                            $indexing++;
                                        @endphp

                                    </tr>
                                @endforeach --}}

                                @foreach ($gmm_criteria as $index => $criteria)
                                    <tr>
                                        <td>{{ $index }}</td>

                                        @foreach ($criteria as $_index => $_criteria)
                                            @php
                                                $bobot_nilai = $bobots->firstWhere('id_kriteria', $_criteria->id);
                                            @endphp
                                            <td>
                                                <x-SelectInputBobot id="{{ $_criteria->id }}"
                                                    name="{{ strtolower($index) }}[{{ $_criteria->id }}]"
                                                    dvalue="{{ $bobot_nilai ? $bobot_nilai->bobot : 0 }}"
                                                    readonly="{{ $indexing == $_index }}"
                                                    disabled="{{ $indexing > $_index }}" />
                                            </td>
                                        @endforeach

                                        @php
                                            $indexing++;
                                        @endphp

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="dropdown-divider" />
                    <div class="card-footer text-body-secondary">
                        <a href="{{ route('Bobot::index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <!--/ Striped Rows -->
        </div>
    </div>
@endsection
