@if (!$readonly && !$disabled)
    <select class="form-select" aria-label="Default select example" name="{{ $name }}"
        {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>
        <option {{ $dvalue == '1.00' ? 'selected' : '' }} value="1">1</option>
        <option {{ $dvalue == '2.00' ? 'selected' : '' }} value="2">2</option>
        <option {{ $dvalue == '3.00' ? 'selected' : '' }} value="3">3</option>
        <option {{ $dvalue == '4.00' ? 'selected' : '' }} value="4">4</option>
        <option {{ $dvalue == '5.00' ? 'selected' : '' }} value="5">5</option>
        <option {{ $dvalue == '6.00' ? 'selected' : '' }} value="6">6</option>
        <option {{ $dvalue == '7.00' ? 'selected' : '' }} value="7">7</option>
        <option {{ $dvalue == '8.00' ? 'selected' : '' }} value="8">8</option>
        <option {{ $dvalue == '9.00' ? 'selected' : '' }} value="9">9</option>
        <option {{ $dvalue == '0.50' ? 'selected' : '' }} value="0.50">0.50</option>
        <option {{ $dvalue == '0.33' ? 'selected' : '' }} value="0.33">0.33 </option>
        <option {{ $dvalue == '0.25' ? 'selected' : '' }} value="0.25">0.25</option>
        <option {{ $dvalue == '0.20' ? 'selected' : '' }} value="0.20">0.20</option>
        <option {{ $dvalue == '0.17' ? 'selected' : '' }} value="0.17">0.17</option>
        <option {{ $dvalue == '0.14' ? 'selected' : '' }} value="0.14">0.14</option>
        <option {{ $dvalue == '0.13' ? 'selected' : '' }} value="0.13">0.13</option>
        <option {{ $dvalue == '0.11' ? 'selected' : '' }} value="0.11">0.11</option>
    </select>
@else
    @if (!$disabled)
        <input class="form-control" type="number" step="0.01" id="{{ $id }}" name="{{ $name }}"
            value="1.00" readonly />
    @else
        <input class="form-control" type="number" step="0.01" id="{{ $id }}" name="{{ $name }}"
            value="0.00" disabled />
    @endif

@endif
