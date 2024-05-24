<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kriteria</th>
                {{-- @foreach ($criteria_gb_name as $index => $criteria)
                <th>{{ $index }}</th>
                @endforeach
                <th>Jumlah</th> --}}
                <th>PW</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            {{-- @foreach ($criteria_gb_name as $index => $criteria)
                <tr>
                    <td>{{ $index }}</td>

                    @foreach ($criteria as $_index => $_criteria)
                        @php
                            $hasil = number_format(
                                $pairComparisonMatrix?->firstWhere('name', $_criteria->jenis)?->hasil != 0
                                    ? $anhipro?->firstWhere('kriteria_id', $_criteria->id)?->hasil /
                                        $pairComparisonMatrix?->firstWhere('name', $_criteria->jenis)?->hasil
                                    : 1,
                                3,
                            );
                        @endphp

                        <td>{{ $hasil }}</td>
                    @endforeach

                    <td>{{ $calculatePriorityWeights->firstWhere('name', "{$index}-jumlah")?->hasil }}</td>
                    <td>{{ number_format($calculatePriorityWeights->firstWhere('name', "{$index}-pw")?->hasil, 2) }}
                    </td>

                </tr>
            @endforeach --}}

            @foreach ($dataCalculatePriorityWeights as $index => $value)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
