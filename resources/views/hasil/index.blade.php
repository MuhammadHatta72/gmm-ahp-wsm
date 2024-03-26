@extends('layouts.app')

@section('title', 'Hasil')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Hasil</h4>

    <x-SessionAlertComponent />
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <x-TabItemComponent title="GMM" key="gmm" active="active" />
            <x-TabItemComponent title="AHP" key="ahp" />
        </ul>
        <div class="tab-content">
            <x-TabContentComponent key="gmm" active="active">
                <button type="button" class="btn btn-primary mb-3" onclick="gmmCalcuate()">Hitung GMM</button>
                <hr class="dropdown-divider" />
                <x-TableBobotShowComponent />
            </x-TabContentComponent>
            <x-TabContentComponent key="ahp">
                <button type="button" class="btn btn-primary mb-3" onclick="ahpCalcuate()">Hitung AHP</button>
                <hr class="dropdown-divider" />

                <p class="text-center">Matriks Perbandingan Pasangan</p>
                <x-TablePairComparisonMatrixShowComponent />
                <hr class="dropdown-divider" />

                <p class="text-center">Menghitung Bobot Prioritas</p>
                <x-TableCalculatePriorityWeightsShowComponent />
                <hr class="dropdown-divider" />

                <p class="text-center">Mengalikan matriks dengan PW</p>
                <x-TableCalculatingConsistencyRatioShowComponent />
                <hr class="dropdown-divider" />

                <p class="text-center">Membagi hasil dari perhitungan diatas dengan PW</p>
                <x-TableDevideConsistencyRatioWithPwShowComponent />
                <hr class="dropdown-divider" />

                <p class="text-center">Menghitung λmaks</p>
                <x-TableMenghitungAmaksShowComponent />
                <hr class="dropdown-divider" />

                <p class="text-center">Menghitung Consistency Index(CI)</p>
                <x-TableMenghitungConsistencyIndexCIShowComponent />
                <hr class="dropdown-divider" />

                <p class="text-center">Menghitung Consistency Ratio(CR)</p>
                <x-TableMenghitungConsistencyRatioCRShowComponent />
                <hr class="dropdown-divider mb-3" />

            </x-TabContentComponent>
        </div>
    </div>

</div>

{{-- form handler --}}
<form action="{{ route('Hasil::store') }}" method="post" id="form-gmm-calculate">
    @csrf
    <input type="hidden" name="calculate" value="gmm">
</form>

<form action="{{ route('Hasil::store') }}" method="post" id="form-ahp-calculate">
    @csrf
    <input type="hidden" name="calculate" value="ahp">
</form>

</div>
@include('layouts.delete-confirm')
@endsection

<script>
    function gmmCalcuate() {
        const form_calculate = document.getElementById('form-gmm-calculate')
        if (form_calculate) {
            form_calculate.submit()
        }
    }

    function ahpCalcuate() {
        const form_calculate = document.getElementById('form-ahp-calculate')
        if (form_calculate) {
            form_calculate.submit()
        }
    }

</script>
