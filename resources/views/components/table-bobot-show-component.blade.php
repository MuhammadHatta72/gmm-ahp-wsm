<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kriteria</th>
                @foreach($gmm_criteria as $index => $criteria)
                <th>{{ $index }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <!-- idnex sould be [$index, $_index] -->
            @php
            $indexing = 0
            @endphp

            @foreach($gmm_criteria as $index => $criteria)
            <tr>
                <td>{{ $index }}</td>

                @foreach($criteria as $_index => $_criteria)
                <td>{{ $geomean->firstWhere('kriteria_id', $_criteria->id)?->hasil }}</td>
                @endforeach

                @php
                $indexing = $indexing + 1
                @endphp

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
