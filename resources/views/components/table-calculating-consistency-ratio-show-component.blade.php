<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kriteria</th>
                @foreach($criteria_gb_name as $index => $criteria)
                <th>{{ $index }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <!-- idnex sould be [$index, $_index] -->
            @php
            $indexing = 0;
            $rowspan = count($criteria_gb_name);
            @endphp

            @foreach($criteria_gb_name as $index => $criteria)
            <tr>
                <td>{{ $index }}</td>

                @foreach($criteria as $_index => $_criteria)
                <td>{{ $anhipro->firstWhere('kriteria_id', $_criteria->id)?->hasil }}</td>
                @endforeach

                {{-- {{ dd($rowspan, count($criteria)) }} --}}
                @if($rowspan >= count($criteria))
                <td rowspan="{{ $rowspan }}">X</td>
                @endif

                <td>{{ $calculatePriorityWeights->firstWhere('name', "{$index}-pw")?->hasil }}</td>

                @if($rowspan >= count($criteria))
                <td rowspan="{{ $rowspan }}">=</td>

                @php
                $rowspan -= 1;
                @endphp

                @endif

                <td>{{ $consistencyRatio->firstWhere('name', $index)?->hasil }}</td>

                @php
                $indexing = $indexing + 1
                @endphp

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
