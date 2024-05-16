@extends('layouts.app')

@section('title', 'Hasil')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Hasil</h4>
        @if(request()->user()->role == 'admin')
        <div class="d-flex flex-row-reverse">
            <form action="{{ route('Hasil::export') }}" method="post">
                @csrf
                @method('POST')

                <button class="btn btn-primary mb-3">Export</button>
            </form>
        </div>
        @endif
    </div>

    <x-SessionAlertComponent />


    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <x-TabItemComponent title="Nilai Kriteria" key="gmm" active="{{ request()->get('name') == 'gmm' || request()->get('name') == ''  ? 'active' : '' }}" />
            <x-TabItemComponent title="Bobot Kriteria" key="ahp" active="{{ request()->get('name') == 'ahp' ? 'active' : '' }}" />
            <x-TabItemComponent title="Rekomendasi" key="wsm" active="{{ request()->get('name') == 'wsm' ? 'active' : '' }}" />
        </ul>
        <div class="tab-content">
            <x-TabContentComponent key="gmm" active="{{ request()->get('name') == 'gmm' || request()->get('name') == ''  ? 'active' : '' }}">
                @if(request()->user()->role == 'admin')
                <button type="button" class="btn btn-primary mb-3" onclick="gmmCalcuate()">Hitung Nilai Kriteria</button>
                @endif
                <hr class="dropdown-divider" />

                <x-TableBobotShowComponent />
                <hr class="dropdown-divider mb-3" />

            </x-TabContentComponent>
            <x-TabContentComponent key="ahp" active="{{ request()->get('name') == 'ahp' ? 'active' : '' }}">
                @if(request()->user()->role == 'admin')
                <button type="button" class="btn btn-primary mb-3" onclick="ahpCalcuate()">Hitung Bobot Kriteria</button>
                @endif
                <hr class="dropdown-divider" />

                <x-TableAhpShowComponent />
            </x-TabContentComponent>
            <x-TabContentComponent key="wsm" active="{{ request()->get('name') == 'wsm' ? 'active' : '' }}">
                @if(request()->user()->role == 'admin')
                <button type="button" class="btn btn-primary mb-3" onclick="wsmCalcuate()">Hitung Rekomendasi</button>
                @endif

                <x-TableWsmShowComponent />
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

<form action="{{ route('Hasil::store') }}" method="post" id="form-wsm-calculate">
    @csrf
    <input type="hidden" name="calculate" value="wsm">
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

    function wsmCalcuate() {
        const form_calculate = document.getElementById('form-wsm-calculate')
        if (form_calculate) {
            form_calculate.submit()
        }
    }

</script>
