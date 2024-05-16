@php
$table = [
["Kedua elemen sama pentingnya", [[1,'-']]],
["Elemen yang satu sedikit lebih penting dari pada elemen yang lain", [[3,'0,33']]],
["Elemen yang satu lebih penting dari pada elemen lainnya", [[5,'0,20']]],
["Satu elemen jelas lebih mutlak penting dari pada elemen lainnya", [[7,'0,14']]],
["Satu elemen mutlak penting dari pada elemen lainnya", [[9,'0,11']]],
["Nilai-nilai antara dua nilai pertimbangan-pertimbangan berdekatan", [
[2,'0,50'],
[4,'0,25'],
[6,'0,17'],
[8,'0,13'],
]],
];
@endphp


<div class="card mb-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" rowspan="2">#</th>
                <th scope="col" rowspan="2" class="text-top">Keterangan</th>
                <th scope="col" colspan="2" class="text-center">Nilai</th>
            </tr>
            <tr>
                <th scope="col">Penting</th>
                <th scope="col">Tidak</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table as $row)
            <tr>
                <th rowspan="{{ count($row[1]) }}" scope="row">{{ $loop->iteration }}</th>
                <td rowspan="{{ count($row[1]) }}">{{ $row[0] }}</td>
                @foreach($row[1] as $index => $data)
                @if($index > 0)
            <tr>
                @endif
                <td>{{ $data[0] }}</td>
                <td>{{ $data[1] }}</td>
                @if($index > 0)
            </tr>
            @endif
            @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
