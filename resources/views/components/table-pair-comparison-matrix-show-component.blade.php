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
            $indexing = 0
            @endphp

            @foreach($criteria_gb_name as $index => $criteria)
            <tr>
                <td>{{ $index }}</td>

                @foreach($criteria as $_index => $_criteria)
                <td>{{ $anhipro->firstWhere('kriteria_id', $_criteria->id)?->hasil }}</td>
                @endforeach

                @php
                $indexing = $indexing + 1
                @endphp

            </tr>
            @endforeach
            <tr>
                <td></td>
                @foreach($criteria_gb_jenis as $index => $criteria)

                <td>{{ $pairComparisonMatrix->firstWhere('name', $index)->hasil }}</td>

                @endforeach
            </tr>
        </tbody>
    </table>
</div>
