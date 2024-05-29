{{-- <p class="text-center">Normalisasi</p>
<x-TableNormalisasiShowComponent />
<hr class="dropdown-divider" />

<p class="text-center">WSM Normalisasi</p>
<x-TableWSMNormalisasiShowComponent />
<hr class="dropdown-divider" /> --}}

<p class="text-center">WSM Hasil</p>
<x-TableWSMHasilShowComponent filter="{{ request()->get('filter') }}" count="{{ request()->get('count') }}" />
<hr class="dropdown-divider" />
