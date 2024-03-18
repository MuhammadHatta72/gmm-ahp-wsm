@extends('layouts.app')

@section('title', 'Hasil')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Hasil</h4>

    <x-SessionAlertComponent />
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <x-TabItemComponent title="GMM" key="gmm" />
        </ul>
        <div class="tab-content">
            <x-TabContentComponent key="gmm">
                <button type="button" class="btn btn-primary mb-3" onclick="gmmCalcuate()">Hitung GMM</button>
                <hr class="dropdown-divider" />
                <x-TableBobotShowComponent />
            </x-TabContentComponent>
        </div>
    </div>

</div>

{{-- form gmm handler --}}

<form action="{{ route('Hasil::store') }}" method="post" id="form-gmm-calculate">
    @csrf
    <input type="hidden" name="calculate" value="gmm">
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

</script>
