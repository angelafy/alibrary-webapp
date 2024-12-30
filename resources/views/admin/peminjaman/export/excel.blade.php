<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Peminjaman</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $index => $peminjaman)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $peminjaman->kode_peminjaman }}</td>
                <td>{{ $peminjaman->user->nama }}</td>
                <td>{{ $peminjaman->user->jenis_kelamin }}</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d-m-Y') }}</td>
                <td>
                    @switch($peminjaman->status)
                        @case(0)
                            Pending Persetujuan
                            @break
                        @case(1)
                            Disetujui
                            @break
                        @case(2)
                            Dipinjam
                            @break
                        @case(3)
                            Dikembalikan
                            @break
                        @case(4)
                            Terlambat
                            @break
                        @case(5)
                            Hilang
                            @break
                        @case(6)
                            Pending Pengembalian
                            @break
                        @default
                            Unknown Status
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
