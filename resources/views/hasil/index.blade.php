@extends('layouts.app')

@section('title', 'Hasil')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Hasil</h4>
            {{-- @if (request()->user()->role == 'admin') --}}
            <form action="{{ route('Hasil::export') }}" method="post">
                @csrf
                @method('POST')

                <button class="btn btn-primary mb-3">Export</button>
            </form>
            {{-- @endif --}}
        </div>

        <x-SessionAlertComponent />

        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <x-TabItemComponent title="Nilai Kriteria" key="gmm"
                    active="{{ request()->get('name') == 'gmm' || request()->get('name') == '' ? 'active' : '' }}" />
                <x-TabItemComponent title="Bobot Kriteria" key="ahp"
                    active="{{ request()->get('name') == 'ahp' ? 'active' : '' }}" />
                <x-TabItemComponent title="Rekomendasi" key="wsm"
                    active="{{ request()->get('name') == 'wsm' ? 'active' : '' }}" />
            </ul>
            <div class="tab-content">
                <x-TabContentComponent key="gmm"
                    active="{{ request()->get('name') == 'gmm' || request()->get('name') == '' ? 'active' : '' }}">
                    @if (request()->user()->role == 'admin')
                        <button type="button" class="btn btn-primary mb-3" onclick="gmmCalcuate()">Hitung GMM</button>
                    @endif
                    <hr class="dropdown-divider" />

                    <x-TableBobotShowComponent />
                    <hr class="dropdown-divider mb-3" />

                </x-TabContentComponent>
                <x-TabContentComponent key="ahp" active="{{ request()->get('name') == 'ahp' ? 'active' : '' }}">
                    @if (request()->user()->role == 'admin')
                        <button type="button" class="btn btn-primary mb-3" onclick="ahpCalcuate()">Hitung AHP</button>
                    @endif
                    <hr class="dropdown-divider" />

                    <x-TableAhpShowComponent />
                </x-TabContentComponent>
                <x-TabContentComponent key="wsm" active="{{ request()->get('name') == 'wsm' ? 'active' : '' }}">
                    <div class="d-flex justify-content-between">
                        @if (request()->user()->role == 'admin')
                            <button type="button" class="btn btn-primary mb-3" onclick="wsmCalcuate()">Hitung WSM</button>
                        @endif

                        <form action="" method="get">
                            <div class="d-flex gap-3">
                                <div class="input-group">
                                    <input type="number" name="count" class="form-control" placeholder="Masukkan Jumlah">
                                    <button class="btn btn-outline-primary" type="submit">Jumlah</button>
                                </div>
                                <div class="input-group">
                                    <select name="filter" class="form-select">
                                        <option value="">Filter Alat</option>
                                        <option value="FL">FL</option>
                                        <option value="QCC">QCC</option>
                                        <option value="RST">RST</option>
                                        <option value="RTC">RTC</option>
                                        <option value="TTR">TTR</option>
                                    </select>
                                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>


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
