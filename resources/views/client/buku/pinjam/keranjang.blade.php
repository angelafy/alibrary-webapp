<x-client-app>

    <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
        <div x-data="mobileAppDownloadInfo()" x-cloak x-show="mobileAppDownloadInfo"
            class="flex mb-6 py-2 lg:py-2.5 px-2 lg:px-4 rounded-lg border border-orange-300 bg-orange-50 items-center justify-between text-xs lg:text-sm text-orange-700">
            <div class="flex items-center space-x-1.5">
                <svg fill="none" stroke="currentColor" class="w-4 h-4" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
                    </path>
                </svg>
            </div>
            <div class="cursor-pointer hover:bg-red-100 rounded-lg p-1" @click="closeMobileAppDownloadInfo">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="fixed z-50 inset-0" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                x-show="openMobileAppDownloadLink">
                <div class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div @click.outside="openMobileAppDownloadLink = false" style="max-height: 36rem!important;"
                        class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-full lg:max-w-lg">
                        <div class="bg-gray-50 p-4 lg:p-6">
                            <div class="flex items-center justify-between">
                                <h1 class="font-bold text-primary-600 text-lg">
                                    Unduh JAKLITERA Mobile
                                </h1>

                                <div @click="openMobileAppDownloadLink = false" class="cursor-pointer text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>

                            <div class="mt-2 mb-6 text-primary-600">
                                Dapatkan akses ke koleksi literatur terbaik dengan JAKLITERA. Unduh aplikasinya di
                                Android dan iOS, dan mulai petualangan membaca Anda hari ini!
                            </div>

                            <div class="flex items-center gap-2">
                                <a href="https://play.google.com/store/apps/details?id=id.dispusipjakarta.jaklitera"
                                    target="_blank">
                                    <img src="https://perpustakaan.jakarta.go.id/assets/img/GetItOnGooglePlay_Badge_Web_color_Indonesian.png"
                                        class="h-10 transition ease-in-out hover:-translate-y-1 hover:scale-110"
                                        alt="">
                                </a>
                                <a href="https://apps.apple.com/id/app/jaklitera/id6504686405" target="_blank">
                                    <img src="https://perpustakaan.jakarta.go.id/assets/img/Download_on_the_App_Store_Badge_ID_RGB_blk_100317.svg"
                                        class="h-10 transition ease-in-out hover:-translate-y-1 hover:scale-110"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50">




        </div>

        <div class="min-h-screen">
            <section>


                <div>
                    <h1 class="text-xl font-bold">Keranjang</h1>
                    <p class="text-gray-600 text-sm">Yuk selesaikan peminjaman kamu</p>
                </div>

                <div class="relative">
                    <div class="fixed w-full lg:w-4/6 z-10 mx-auto justify-center bottom-0 left-0 right-0">
                        <form class="needs-validation" id="checkout-form"
                            action="https://perpustakaan.jakarta.go.id/transaction/store" method="POST">
                            <input type="hidden" name="_token" value="hXMOprJNZnt2XEeoLcjwRMbiXcjWRcOW6LoWeVGp">
                            <input type="hidden" name="cart_id[]" value="9dbccfe9-14da-4a3f-8426-e235f25a666c">
                            <input type="hidden" name="collection_location_id[]" value="12">
                            <div
                                class="grid grid-cols-2 items-center border-t border-t-primary-500 p-3 gap-2 lg:gap-3 bg-gray-50 text-center divide-x-0 lg:divide-x">
                                <a href="https://perpustakaan.jakarta.go.id/book"
                                    class="w-full border border-primary-500 text-primary-500 flex items-center justify-center gap-2 cursor-pointer text-sm hover:bg-gray-100 px-6 py-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span>Tambah Buku</span>
                                </a>
                                <div x-data="{ checkoutModal: false }" x-cloak>
                                    <div @click="checkoutModal = !checkoutModal"
                                        class="w-full flex items-center justify-center gap-2 cursor-pointer rounded-lg bg-primary-600 text-sm text-white px-6 py-2 hover:bg-primary-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span>Pinjam</span>
                                    </div>

                                    <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title"
                                        role="dialog" aria-modal="true" x-show="checkoutModal">
                                        <div
                                            class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                aria-hidden="true"></div>
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
                                                                Pinjam buku ini?
                                                            </h3>

                                                            <p class="text-gray-600 text-xs text-center lg:text-start">
                                                                Pilih lokasi pengambilan dan tekan "Pinjam Buku"
                                                                untuk lanjut
                                                            </p>

                                                            <div>
                                                                <h3
                                                                    class="mb-2 mt-4 text-xs lg:text-sm leading-6 font-medium text-gray-900">
                                                                    Lokasi Pengambilan
                                                                    <span
                                                                        class="text-sm text-red-600 font-medium">*</span>
                                                                </h3>
                                                                <label for="pickup_location" class="hidden"></label>
                                                                <select id="pickup_location" name="pickup_location"
                                                                    class="text-xs lg:text-sm w-full form-select rounded-lg font-medium"
                                                                    onchange="getPickupInfo(this)" required>
                                                                    <option disabled selected value="">
                                                                        --Pilih Lokasi Pengambilan--
                                                                    </option>
                                                                    <option value="6"
                                                                        name="Perpustakaan Jakarta - Cikini"
                                                                        address="Jln. Cikini Raya No. 73, Komplek Taman Ismail marzuki, Jakarta Pusat">
                                                                        Perpustakaan Jakarta - Cikini
                                                                    </option>
                                                                    <option value="11"
                                                                        name="Perpustakaan Jakarta Barat - Tanjung Duren"
                                                                        address="Jalan Tanjung Duren Barat Raya No. 36">
                                                                        Perpustakaan Jakarta Barat - Tanjung Duren
                                                                    </option>
                                                                    <option value="12"
                                                                        name="Perpustakaan Jakarta Timur - Jatinegara"
                                                                        address="Jalan Jatinegara Timur IV, Rawa Bunga, Jatinegara">
                                                                        Perpustakaan Jakarta Timur - Jatinegara
                                                                    </option>
                                                                    <option value="13"
                                                                        name="Perpustakaan Jakarta Utara - Koja"
                                                                        address="Jl. Logistik Raya No. 2 Kelurahan Tugu Selatan Kecamatan Koja Jakarta Utara">
                                                                        Perpustakaan Jakarta Utara - Koja
                                                                    </option>
                                                                    <option value="14"
                                                                        name="Perpustakaan Jakarta Pusat - Petojo Enclek"
                                                                        address="Jl. Tanah Abang 1 Kebon Jahe Jakarta Pusat">
                                                                        Perpustakaan Jakarta Pusat - Petojo Enclek
                                                                    </option>
                                                                    <option value="15"
                                                                        name="Perpustakaan Jakarta Selatan - Gandaria Tengah"
                                                                        address="Jl. Gandaria Tengah V No.3, RT.2/RW.1, Kramat Pela, Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12130, Indonesia ">
                                                                        Perpustakaan Jakarta Selatan - Gandaria
                                                                        Tengah
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mt-4 hidden" id="pickupInfoPanel">
                                                                <h3
                                                                    class="text-xs lg:text-sm leading-6 font-medium text-gray-900">
                                                                    Alamat Pengambilan
                                                                </h3>
                                                                <p class="capitalize text-xs border border-orange-500 rounded-lg p-3 mt-2 text-orange-500 bg-orange-50"
                                                                    id="pickupAddress"></p>
                                                            </div>

                                                            <div class="my-4 hidden">
                                                                <h3
                                                                    class="text-xs lg:text-sm leading-6 font-medium text-gray-900">
                                                                    Metode Pengambilan
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
                                                                        Maks. Peminjaman
                                                                        : 14 Hari
                                                                    </li>
                                                                    <li>Proses penyiapan buku dalam waktu 2x24 jam
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="flex items-center gap-2 my-4">
                                                                <input id="disclaimer" name="disclaimer"
                                                                    type="checkbox" required
                                                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                                                <label for="disclaimer"
                                                                    class="block text-xs lg:text-sm text-gray-900">
                                                                    Dengan ini saya menyetujui
                                                                    <a href="https://perpustakaan.jakarta.go.id/supports/borrowing-and-returning-rules"
                                                                        class="font-medium underline text-primary-500">
                                                                        Syarat & Ketentuan
                                                                    </a>
                                                                    yang berlaku
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

                <div class="my-4 lg:my-6">
                    <div class="flex flex-col gap-y-3 lg:gap-y-4">
                        @foreach ($keranjang->detailKeranjang as $detail)
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
                                                {{ $detail->buku->penulis->nama_author }} (Pengarang) ;
                                                {{ $detail->buku->penerbit->nama_penerbit }} (Penerbit)
                                            </h3>
                                            <div class="text-xs mt-2 lg:mt-3 text-gray-600">
                                                Sinopsis: {{ $detail->buku->sinopsis }}
                                            </div>

                                        </div>
                                        <div class="flex items-center space-x-2 lg:space-x-3">
                                            <div class="w-full">
                                                <label for="notes" class="sr-only"></label>
                                                <input id="notes"
                                                    class="text-xs lg:text-sm form-input rounded-lg w-full"
                                                    data-id="9dbccfe9-14da-4a3f-8426-e235f25a666c" name="note"
                                                    onchange="updateNote(this)" placeholder="Catatan" type="text"
                                                    value="Lorem Ipsum" />
                                            </div>
                                            <div x-data="{ deleteCartItem: false }" x-cloak>
                                                <div @click="deleteCartItem = true"
                                                    class="cursor-pointer flex items-center justify-center rounded-lg border p-3 lg:p-2.5 border-red-400 text-red-400 space-x-2 hover:bg-red-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 lg:w-4 h-4 lg:h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </div>

                                                <div class="fixed z-50 inset-0" aria-labelledby="modal-title"
                                                    role="dialog" aria-modal="true" x-show="deleteCartItem">
                                                    <div
                                                        class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                            aria-hidden="true"></div>
                                                        <span
                                                            class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                            aria-hidden="true">&#8203;</span>
                                                        <div @click.outside="deleteCartItem = false"
                                                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg">
                                                            <form class="needs-validation"
                                                                action="https://perpustakaan.jakarta.go.id/cart/9dbccfe9-14da-4a3f-8426-e235f25a666c"
                                                                method="POST">
                                                                <input type="hidden" name="_token"
                                                                    value="hXMOprJNZnt2XEeoLcjwRMbiXcjWRcOW6LoWeVGp" />
                                                                <input type="hidden" name="_method"
                                                                    value="DELETE" />
                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div
                                                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                            <svg class="h-6 w-6 text-red-600"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke="currentColor"
                                                                                aria-hidden="true">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <h3 class="text-base lg:text-lg leading-6 font-medium text-gray-900"
                                                                                id="modal-title">
                                                                                Hapus Buku
                                                                            </h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">
                                                                                    Apakah kamu yakin ingin menghapus
                                                                                    buku ini dari daftar peminjaman?
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="bg-gray-50 px-4 py-3 justify-center lg:justify-end flex items-center gap-2">
                                                                    <button type="submit"
                                                                        class="text-sm lg:text-base w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-700 font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto">
                                                                        Ya
                                                                    </button>
                                                                    <button @click="deleteCartItem = false"
                                                                        type="button"
                                                                        class="text-sm lg:text-base w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:w-auto">
                                                                        Batal
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- @endif --}}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- <div class="mt-12 mb-4 sm:mb-16">
            <div class="flex items-center space-x-2">
                <div class="rounded-full h-2 w-2 bg-orange-500"></div>
                <h4 class="font-medium text-lg">Buku Rekomendasi Lainnya</h4>
            </div>

            <div class="mt-4">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=JAKPU-07100000000012">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Dasar-dasar perencanaan beton bertulang">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Dasar-dasar perencanaan beton bertulang</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">KUSUMA,
                                        Gideon H.</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=JAKPU-07110000000058">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Pendidikan jasmani olah raga dan kesehatan 4 : Penjaskes untuk kelas IV SD">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        OLAHRAGA / STUDI DAN PENGAJARAN / PENJASKES
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Pendidikan jasmani olah raga dan kesehatan 4 : Penjaskes untuk kelas
                                        IV SD</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1"></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=JAKPU-03100000017700">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Tanya Jawab Kredit Dokumenter">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        EKONOMI INTERNASIONAL
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Tanya Jawab Kredit Dokumenter</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">A.A. RACHMAT
                                        M. Z</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=JAKPU-12120000000498">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/65801.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="INDONESIAN heritage 7 : visual art">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        INDONESIA / KESENIAN
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        INDONESIAN heritage 7 : visual art</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">INDONESIAN
                                        heritage</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=JAKPU-12120000000541">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Lembaran negara Republik Indonesia tahun 1974 no. 1-67">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        UNDANG/UNDANG DAN PERATURAN
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Lembaran negara Republik Indonesia tahun 1974 no. 1-67</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">INDONESIA.
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=JAKPU-12139000000607">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Double vision 2C : reptil-reptil keren">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        REPTIL / KARYA BERGAMBAR
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Double vision 2C : reptil-reptil keren</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">RED Bird
                                        Publishing</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000774555">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/98289.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Understand-Inc People :  Strategi Taktis Komunikasi Berdasarkan Kepribadian">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        KOMUNIKASI / STRATEGI
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Understand-Inc People : Strategi Taktis Komunikasi Berdasarkan
                                        Kepribadian</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Erwin
                                        Parengkuan</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000787777">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/111569.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Tips Job&#039;s Hunting">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Tips Job&#039;s Hunting</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Dewi Anggiani
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000797852">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/121730.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Pangan Bagi Kehidupan">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        Sosial
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Pangan Bagi Kehidupan</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">-</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000799225">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/123117.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Ensiklopedia junior : hutan">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        ENSIKLOPEDIA ANAK / HUTAN
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Ensiklopedia junior : hutan</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Tonny Prakoso
                                        ; Kartika Indah Prativi</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000806262">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/130265.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Resep komplit olahan tempe">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        MASAKAN
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Resep komplit olahan tempe</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Fenita
                                        Agustina</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000831224">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/176066.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Longuseiku :  Kumpulan Puisi">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        Puisi
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Longuseiku : Kumpulan Puisi</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Iverdixon
                                        Tinungki</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000855529">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/257341.jpeg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Ombak Losari : Sajak - Sajak dari Makassar">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        Kesusasteraan Makassar / Puisi
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Ombak Losari : Sajak - Sajak dari Makassar</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Puisi
                                        Indonesia (Pengarang) ; S. Sinansari Ecip (penyunting)</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000862069">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/278384.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Perjalanan :  kumpulan puisi">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        Kesusastraan / Puisi
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Perjalanan : kumpulan puisi</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Basyral
                                        Hamidy Harahap (Pengarang)</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/book/detail?cn=INLIS000000000863653">
                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                            <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/283619.jpg"
                                src="https://perpustakaan.jakarta.go.id/assets/img/no-images.png"
                                onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                alt="Kugapai sakinah bersamamu">
                            <div
                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70  p-3 flex flex-col justify-between">
                                <div class="flex items-center justify-between">





                                </div>

                                <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                    <div
                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                        Pernikahan sakinah
                                    </div>
                                    <h1
                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                        Kugapai sakinah bersamamu</h1>
                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">Abdul Syukur
                                        al-Azizi (Pengarang) ; Jabir Ahmad al-Hajjawi (Pengarang)</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div> --}}
            </section>
        </div>

    </main>
</x-client-app>
