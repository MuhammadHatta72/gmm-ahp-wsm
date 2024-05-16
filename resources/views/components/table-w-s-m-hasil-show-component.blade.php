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
                <th>Hasil</th>
                {{-- <th>Rangking</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($wsm_result_normalisasi as $_wsm_result_normalisasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $_wsm_result_normalisasi->kode }}</td>
                <td>{{ $_wsm_result_normalisasi->nama }}</td>
                <td>{{ $_wsm_result_normalisasi->utilisasi }}</td>
                <td>{{ $_wsm_result_normalisasi->availability }}</td>
                <td>{{ $_wsm_result_normalisasi->reliability }}</td>
                <td>{{ $_wsm_result_normalisasi->jam_operasi }}</td>
                <td>{{ $_wsm_result_normalisasi->idle }}</td>
                <td>{{ $_wsm_result_normalisasi->jam_tersedia }}</td>
                <td>{{ $_wsm_result_normalisasi->jam_bda }}</td>
                <td>{{ $_wsm_result_normalisasi->jumlah_bda }}</td>
                <td>{{ $_wsm_result_normalisasi->hasil }}</td>
                {{-- <td>{{ $_wsm_result_normalisasi->rangking }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
