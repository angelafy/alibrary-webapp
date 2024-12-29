<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Buku</th>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tanggal Terbit</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode_buku }}</td>
                <td>{{ $item->isbn }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->penulis->name }}</td>
                <td>{{ $item->penerbit?->name }}</td>
                <td>{{ $item->terbit ? \Carbon\Carbon::parse($item->terbit)->format('d-m-Y') : '-' }}</td>
                <td>{{ $item->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
