<x-client-app>
    <div class="flex min-h-screen relative">
        <header class="w-full z-50 fixed lg:hidden"></header>
        <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
            <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50"></div>

            <div class="min-h-screen">
                <section class="relative mb-20">
                    <div class="rounded-lg border">
                        <div class="grid grid-cols-1 lg:grid-cols-2 border-b p-4">
                            <div>
                                <h2 class="text-lg lg:text-2xl font-bold capitalize">Detail Peminjaman</h2>
                                <h4 class="text-gray-500 text-sm lg:text-base mt-1"></h4>
                            </div>
                            <div class="relative flex flex-wrap items-center gap-2 mt-4 lg:mt-0">
                                <a href="/book?keyword=Bacaan%20kanak%2Fkanak"
                                    class="cursor-pointer">
                                    <div class="absolute top-0 right-0 mt-2 mr-2 text-sm capitalize text-right">
                                        <div class="rounded-lg bg-orange-50 text-orange-500 px-2 py-1">
                                            #{{ $peminjaman->kode_peminjaman }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- gawe tabel info buku --}}
                        <div class="mt-4 lg:mt-6 bg-white rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-4">Informasi Buku</h3>
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b text-left">ISBN</th>
                                        <th class="py-2 px-4 border-b text-left">Judul Buku</th>
                                        <th class="py-2 px-4 border-b text-left">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman->detailPeminjaman as $detail)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $detail->buku->isbn }}</td>
                                            <td class="py-2 px-4 border-b">{{ $detail->buku->title }}</td>
                                            <td class="py-2 px-4 border-b">{{ $detail->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- gawe tabel denda --}}

                        <div class="mt-4 lg:mt-6 bg-white rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-4 text-red-600">Informasi Denda</h3>
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b text-left">Jumlah Denda</th>
                                        <th class="py-2 px-4 border-b text-left">Status</th>
                                        <th class="py-2 px-4 border-b text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($peminjaman->denda && !$peminjaman->denda->status)
                                        <tr>
                                            <td class="py-2 px-4 border-b">Rp
                                                {{ number_format($peminjaman->denda->jumlah, 0, ',', '.') }}</td>
                                            <td class="py-2 px-4 border-b">
                                                <span class="px-2 py-1 rounded-full text-sm bg-red-100 text-red-800">
                                                    Belum Lunas
                                                </span>
                                            </td>
                                            <td class="py-2 px-4 border-b">
                                                <button onclick="initiatePayment()"
                                                    class="bg-primary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                                                    Bayar Sekarang
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Card untuk Sinopsis -->
                        <div class="mt-4 lg:mt-6 bg-white rounded-lg p-4">
                            <div class="flex items-center space-x-2">
                                <div class="rounded-full h-2 w-2 bg-orange-500"></div>
                                <h4 class="font-medium text-lg">Pesan:</h4>
                            </div>
                            <div class="mt-4">
                                <div class="rounded-lg p-4 bg-gray-50 border border-gray-200 text-gray-500">
                                    <span class="block font-medium text-sm line-clamp-2">Mohon untuk mengembalikan buku
                                        dengan tepat waktu, dan tidak menghilangkan buku !</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kembali Button -->
                    <a href="{{ route('pinjam.index') }}"
                        class="flex items-center justify-start gap-4 cursor-pointer rounded-lg bg-primary-500 text-white px-4 py-2 mt-4 hover:bg-primary-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="text-sm">Kembali</span>
                    </a>

                </section>
            </div>
        </main>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-7P5mXHtlZS17kMxg"></script>

    <script>
        function initiatePayment() {
    fetch(`/peminjaman/payment/initiate/{{ $peminjaman->id }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                // SweetAlert untuk menampilkan pesan error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.error,
                });
                return;
            }

            if (data.snap_token) {
                console.log(data.message);

                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        // Setelah pembayaran berhasil, update status denda
                        fetch(`/peminjaman/payment/status/update/{{ $peminjaman->id }}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // SweetAlert untuk sukses dengan pesan dari controller
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Pembayaran Berhasil!',
                                        text: data.success, // Menampilkan pesan dari controller
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    // SweetAlert untuk error saat update status denda
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal Memperbarui Status Denda',
                                        text: 'Silakan coba lagi.',
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error updating denda status:', error);
                                // SweetAlert untuk kesalahan update status denda
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: 'Terjadi kesalahan saat memperbarui status denda.',
                                });
                            });
                    },
                    onPending: function(result) {
                        // You can add a pending state if needed
                    },
                    onError: function(result) {
                        // SweetAlert untuk pembayaran gagal
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Gagal',
                            text: 'Silakan coba lagi.',
                        });
                    },
                    onClose: function() {}
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // SweetAlert untuk error umum
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Silakan coba lagi.',
            });
        });
}

    </script>
</x-client-app>
