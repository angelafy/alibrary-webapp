<x-client-app>

    <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
        <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50">
        </div>
        <div class="min-h-screen">
            <section>


                <div>
                    <h1 class="text-xl font-bold">Keranjang</h1>
                    <p class="text-gray-600 text-sm">Yuk selesaikan
                        peminjaman kamu</p>
                </div>

                <div class="relative">
                    <div class="fixed w-full lg:w-4/6 z-10 mx-auto justify-center bottom-0 left-0 right-0">
                        <form class="needs-validation" id="checkout-form"
                            action="/transaction/store" method="POST">
                            <input type="hidden" name="_token" value="hXMOprJNZnt2XEeoLcjwRMbiXcjWRcOW6LoWeVGp">
                            <input type="hidden" name="cart_id[]" value="9dbccfe9-14da-4a3f-8426-e235f25a666c">
                            <input type="hidden" name="collection_location_id[]" value="12">
                            <div
                                class="grid grid-cols-2 items-center border-t border-t-primary-500 p-3 gap-2 lg:gap-3 bg-gray-50 text-center divide-x-0 lg:divide-x">
                                <a href="{{ route('bukuClient.index')}}"
                                    class="w-full border border-primary-500 text-primary-500 flex items-center justify-center gap-2 cursor-pointer text-sm hover:bg-gray-100 px-6 py-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span>Tambah Buku</span>
                                </a>
                                <div x-data="{ checkoutModal: false }" x-cloak>
                                    <div x-data="{ isKeranjangEmpty: {{ $totalDetailKeranjang == 0 ? 'true' : 'false' }} }" x-cloak>
                                        <!-- Tombol Pinjam hanya akan muncul jika keranjang tidak kosong -->
                                        <div @click="if (!isKeranjangEmpty) {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: 'Anda yakin semua buku ini akan dipinjam?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#337ab7',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Iya',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Ambil ID buku yang dipilih
                                let bukuId = document.getElementById('buku_id').value; // Misalnya buku_id sudah ada di input tersembunyi

                                // Kirim request ke server
                                axios.post('/pinjam/add', { buku_id: bukuId })
                                    .then(response => {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: response.data.message,
                                            icon: 'success',
                                            confirmButtonColor: '#90EE90' // Mengubah warna confirm button pada notifikasi sukses
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    })
                                    .catch(error => {
                                        Swal.fire({
                                            title: 'Gagal!',
                                            text: error.response.data.message,
                                            icon: 'error',
                                            confirmButtonColor: '#90EE90' // Mengubah warna confirm button pada notifikasi error
                                        });
                                    });
                            }
                        });
                    }"
                                            :class="isKeranjangEmpty ?
                                                'cursor-not-allowed bg-gray-400 hover:bg-gray-400' :
                                                'cursor-pointer bg-primary-600 hover:bg-primary-700'"
                                            :disabled="isKeranjangEmpty"
                                            class="w-full flex items-center justify-center gap-2 rounded-lg text-sm text-white px-6 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                            <span>Pinjam</span>
                                        </div>

                                        <!-- Form tersembunyi untuk mengirim permintaan POST, hanya tampil jika keranjang tidak kosong -->
                                        @if ($totalDetailKeranjang > 0)
                                            <form id="pinjamForm" method="POST" action="{{ route('pinjam.store') }}">
                                                @csrf
                                                <!-- ID Buku yang akan dipinjam, misalnya bisa didapat dari data keranjang -->
                                                <input type="hidden" name="buku_id" id="buku_id"
                                                    value="{{ $keranjang->detailKeranjang->first()->buku_id }}">
                                            </form>
                                        @endif
                                    </div>

                                    <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title"
                                        role="dialog" aria-modal="true" x-show="checkoutModal">
                                        <div
                                            class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                aria-hidden="true">
                                            </div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                aria-hidden="true">&#8203;</span>
                                            <div @click.outside="checkoutModal = false"
                                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div
                                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6 text-green-600" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 w-full sm:mt-0.5 sm:ml-4 sm:text-left">
                                                            <h3 class="text-sm lg:text-lg text-center lg:text-start leading-6 text-gray-900"
                                                                id="modal-title">
                                                                Pinjam
                                                                buku
                                                                ini?
                                                            </h3>

                                                            <p class="text-gray-600 text-xs text-center lg:text-start">
                                                                Pilih
                                                                lokasi
                                                                pengambilan
                                                                dan
                                                                tekan
                                                                "Pinjam
                                                                Buku"
                                                                untuk
                                                                lanjut
                                                            </p>

                                                            <div>
                                                                <h3
                                                                    class="mb-2 mt-4 text-xs lg:text-sm leading-6 font-medium text-gray-900">
                                                                    Lokasi
                                                                    Pengambilan
                                                                    <span
                                                                        class="text-sm text-red-600 font-medium">*</span>
                                                                </h3>
                                                                <label for="pickup_location" class="hidden"></label>
                                                                <select id="pickup_location" name="pickup_location"
                                                                    class="text-xs lg:text-sm w-full form-select rounded-lg font-medium"
                                                                    onchange="getPickupInfo(this)" required>
                                                                    <option disabled selected value="">
                                                                        --Pilih
                                                                        Lokasi
                                                                        Pengambilan--
                                                                    </option>
                                                                    <option value="6"
                                                                        name="Perpustakaan Jakarta - Cikini"
                                                                        address="Jln. Cikini Raya No. 73, Komplek Taman Ismail marzuki, Jakarta Pusat">
                                                                        Perpustakaan
                                                                        Jakarta
                                                                        -
                                                                        Cikini
                                                                    </option>
                                                                    <option value="11"
                                                                        name="Perpustakaan Jakarta Barat - Tanjung Duren"
                                                                        address="Jalan Tanjung Duren Barat Raya No. 36">
                                                                        Perpustakaan
                                                                        Jakarta
                                                                        Barat
                                                                        -
                                                                        Tanjung
                                                                        Duren
                                                                    </option>
                                                                    <option value="12"
                                                                        name="Perpustakaan Jakarta Timur - Jatinegara"
                                                                        address="Jalan Jatinegara Timur IV, Rawa Bunga, Jatinegara">
                                                                        Perpustakaan
                                                                        Jakarta
                                                                        Timur
                                                                        -
                                                                        Jatinegara
                                                                    </option>
                                                                    <option value="13"
                                                                        name="Perpustakaan Jakarta Utara - Koja"
                                                                        address="Jl. Logistik Raya No. 2 Kelurahan Tugu Selatan Kecamatan Koja Jakarta Utara">
                                                                        Perpustakaan
                                                                        Jakarta
                                                                        Utara
                                                                        -
                                                                        Koja
                                                                    </option>
                                                                    <option value="14"
                                                                        name="Perpustakaan Jakarta Pusat - Petojo Enclek"
                                                                        address="Jl. Tanah Abang 1 Kebon Jahe Jakarta Pusat">
                                                                        Perpustakaan
                                                                        Jakarta
                                                                        Pusat
                                                                        -
                                                                        Petojo
                                                                        Enclek
                                                                    </option>
                                                                    <option value="15"
                                                                        name="Perpustakaan Jakarta Selatan - Gandaria Tengah"
                                                                        address="Jl. Gandaria Tengah V No.3, RT.2/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12130, Indonesia ">
                                                                        Perpustakaan
                                                                        Jakarta
                                                                        Selatan
                                                                        -
                                                                        Gandaria
                                                                        Tengah
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mt-4 hidden" id="pickupInfoPanel">
                                                                <h3
                                                                    class="text-xs lg:text-sm leading-6 font-medium text-gray-900">
                                                                    Alamat
                                                                    Pengambilan
                                                                </h3>
                                                                <p class="capitalize text-xs border border-orange-500 rounded-lg p-3 mt-2 text-orange-500 bg-orange-50"
                                                                    id="pickupAddress">
                                                                </p>
                                                            </div>

                                                            <div class="my-4 hidden">
                                                                <h3
                                                                    class="text-xs lg:text-sm leading-6 font-medium text-gray-900">
                                                                    Metode
                                                                    Pengambilan
                                                                    <span
                                                                        class="text-sm text-red-600 font-medium">*</span>
                                                                </h3>
                                                                <div class="mt-2 flex items-center gap-4">
                                                                    <div class="flex items-center">
                                                                        <input name="pickup_method_id" type="radio"
                                                                            checked id="Ambil Sendiri" value="1"
                                                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                                                                        <label
                                                                            class="ml-3 block text-sm lg:text-base font-medium text-gray-700"
                                                                            for="Ambil Sendiri">Ambil
                                                                            Sendiri</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="my-4">
                                                                <ul
                                                                    class="list-disc text-gray-800 text-xs sm:text-sm rounded-lg bg-gray-50 p-4 pl-8">
                                                                    <li>
                                                                        Maks.
                                                                        Peminjaman
                                                                        :
                                                                        14
                                                                        Hari
                                                                    </li>
                                                                    <li>Proses
                                                                        penyiapan
                                                                        buku
                                                                        dalam
                                                                        waktu
                                                                        2x24
                                                                        jam
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="flex items-center gap-2 my-4">
                                                                <input id="disclaimer" name="disclaimer"
                                                                    type="checkbox" required
                                                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                                                <label for="disclaimer"
                                                                    class="block text-xs lg:text-sm text-gray-900">
                                                                    Dengan
                                                                    ini
                                                                    saya
                                                                    menyetujui
                                                                    <a href="/supports/borrowing-and-returning-rules"
                                                                        class="font-medium underline text-primary-500">
                                                                        Syarat
                                                                        &
                                                                        Ketentuan
                                                                    </a>
                                                                    yang
                                                                    berlaku
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="bg-gray-50 px-4 py-3 justify-center lg:justify-end flex items-center gap-2">
                                                    <button @click="checkoutModal = false" type="button"
                                                        class="text-sm lg:text-base w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto">
                                                        Batal
                                                    </button>
                                                    <button id="checkoutButton" disabled type="submit"
                                                        onclick="$('#checkout_form').submit()"
                                                        class="text-sm lg:text-base w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-300 font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:w-auto">
                                                        Pinjam Buku
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- gawe isi pinjaman --}}
                @if ($keranjang && $keranjang->detailKeranjang->count() > 0)
                    @foreach ($keranjang->detailKeranjang as $detail)
                        <div class="my-4 lg:my-6">
                            <div class="flex flex-col gap-y-3 lg:gap-y-4">
                                <div class="rounded-lg border p-3 lg:p-4 bg-gray-50">

                                    <div class="grid grid-cols-12 gap-4 lg:gap-5">
                                        {{-- @if ($keranjang->isEmpty())
                <p>Keranjang Anda kosong.</p>
            @else --}}

                                        <div class="col-span-3 lg:col-span-2">
                                            <img data-src="{{ asset('storage/buku/' . $detail->buku->gambar_buku) }}"
                                                alt="{{ $detail->buku->title }}"
                                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-30 sm:h-40">
                                        </div>
                                        <div class="col-span-9 lg:col-span-10 flex flex-col justify-between gap-y-4">
                                            <div>
                                                <h1 class="font-bold text-sm lg:text-xl line-clamp-2">
                                                    {{ $detail->buku->title }}
                                                </h1>
                                                <h3 class="text-gray-700 text-xs lg:text-sm line-clamp-1 mt-1 lg:mt-0">
                                                    {{ $detail->buku->penulis->nama_author }}
                                                    (Pengarang)
                                                    ;
                                                    {{ $detail->buku->penerbit->nama_penerbit }}
                                                    (Penerbit)
                                                </h3>
                                                <div class="text-xs mt-2 lg:mt-3 text-gray-600">
                                                    Sinopsis:
                                                    {{ $detail->buku->sinopsis }}
                                                </div>

                                            </div>
                                            <div class="flex items-center space-x-2 lg:space-x-3">
                                                <div class="w-full">
                                                    <label for="notes" class="sr-only"></label>
                                                    {{-- <input id="notes"
                                    class="text-xs lg:text-sm form-input rounded-lg w-full"
                                    data-id="9dbccfe9-14da-4a3f-8426-e235f25a666c" name="note"
                                    onchange="updateNote(this)" placeholder="Catatan"
                                    type="text" value="Lorem Ipsum" /> --}}
                                                </div>
                                                <div id="bookItem"
                                                    class="col-span-9 lg:col-span-10 flex flex-col justify-between gap-y-4">
                                                    <!-- Konten buku di sini -->
                                                    <div class="flex items-center space-x-2 lg:space-x-3">
                                                        <!-- Tombol Hapus -->
                                                        <button onclick="deleteCartItem('{{ $detail->id }}')"
                                                            class="cursor-pointer flex items-center justify-center rounded-lg border p-3 lg:p-2.5 border-red-400 text-red-400 space-x-2 hover:bg-red-50">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-4 lg:w-4 h-4 lg:h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- @endif --}}
                                    </div>
                                </div>
                    @endforeach
                @else
                    <div class="my-4 lg:my-6">
                        <div class="rounded-lg border p-3 lg:p-4 bg-gray-50">
                            <div class="text-center py-8">
                                <p class="text-gray-500">Keranjang
                                    Anda kosong.</p>
                                <a href="{{ route('bukuClient.index') }}"
                                    class="mt-4 inline-block text-primary-600 hover:text-primary-700">
                                    Cari buku untuk dipinjam
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
        </div>
        </section>
        </div>
    </main>
    <script>
        function deleteCartItem(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Buku akan dihapus dari keranjang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#90EE90',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Send delete request
                    fetch(`/pinjam/keranjang/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: 'Buku berhasil dihapus dari keranjang.',
                                    icon: 'success',
                                    confirmButtonColor: '#90EE90'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                throw new Error(data.message || 'Gagal menghapus buku');
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                error.message || 'Terjadi kesalahan saat menghapus buku.',
                                'error'
                            );
                        });
                }
            });
        }
    </script>

</x-client-app>
