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
            @foreach($alternatif as $_alternatif)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $_alternatif->kode }}</td>
                <td>{{ $_alternatif->nama }}</td>
                <td>{{ $_alternatif->utilisasi }}</td>
                <td>{{ $_alternatif->availability }}</td>
                <td>{{ $_alternatif->reliability }}</td>
                <td>{{ $_alternatif->jam_operasi }}</td>
                <td>{{ $_alternatif->idle }}</td>
                <td>{{ $_alternatif->jam_tersedia }}</td>
                <td>{{ $_alternatif->jam_bda }}</td>
                <td>{{ $_alternatif->jumlah_bda }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
