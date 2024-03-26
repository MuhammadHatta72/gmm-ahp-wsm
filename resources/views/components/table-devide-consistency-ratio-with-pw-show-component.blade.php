<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($consistencyRatioResult as $index => $result)
            <tr>
                <td>{{ $result->name }}</td>
                <td>{{ $result->hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
