@if(!$readonly && !$disabled)

<select class="form-select" aria-label="Default select example" name="{{ $name }}" {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>
    <option selected value='0'>0</option>
    <option {{ $dvalue ? 'selected' : '' }} value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="0,50">0,50</option>
    <option value="0,33 ">0,33 </option>
    <option value="0,25">0,25</option>
    <option value="0,20">0,20</option>
    <option value="0,17">0,17</option>
    <option value="0,14">0,14</option>
    <option value="0,13">0,13</option>
    <option value="0,11">0,11</option>
</select>

@else

@if(!$disabled)

<input class="form-control" type="number" step="0.01" id="{{ $id}}" name="{{ $name }}" value="1.00" readonly />

@else

<input class="form-control" type="number" step="0.01" id="{{ $id}}" name="{{ $name }}" value="0.00" disabled />

@endif

@endif
