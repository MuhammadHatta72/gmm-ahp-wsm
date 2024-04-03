<div class="table-responsive text-nowrap">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama alat</th>
                <th>Utilisasi</th>
                <th>Availability</th>
                <th>Reliability</th>
                <th>Idle</th>
                <th>Jam Tersedia</th>
                <th>Jam Operasi</th>
                <th>Jam BDA</th>
                <th>Jumlah BDA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($normalisasi as $_normalisasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $_normalisasi->kode }}</td>
                <td>{{ $_normalisasi->nama }}</td>
                <td>{{ $_normalisasi->utilisasi }}</td>
                <td>{{ $_normalisasi->availability }}</td>
                <td>{{ $_normalisasi->reliability }}</td>
                <td>{{ $_normalisasi->jam_operasi }}</td>
                <td>{{ $_normalisasi->idle }}</td>
                <td>{{ $_normalisasi->jam_tersedia }}</td>
                <td>{{ $_normalisasi->jam_bda }}</td>
                <td>{{ $_normalisasi->jumlah_bda }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
