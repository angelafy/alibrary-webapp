<x-client-app>


    <div class="flex min-h-screen relative">

        <header class="w-full z-50 fixed lg:hidden">
        </header>
        <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
            <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50">
            </div>

            <div class="min-h-screen">
                <section class="relative mb-20">
                    <div class="fixed w-full lg:w-4/6 z-10 mx-auto justify-center bottom-0 left-0 right-0">
                        <div
                            class="text-sm flex items-center justify-start lg:justify-between border-t border-t-primary-500 py-2.5 lg:py-3 bg-gray-50 text-center divide-x-0 lg:divide-x  px-2 lg:px-0">
                            <div x-data="{ chooseBookLocation: false }" x-cloak="" class="w-full">
                                <div @click="chooseBookLocation = !chooseBookLocation"
                                    class="flex items-center justify-center gap-2 cursor-pointer rounded-lg bg-primary-500 text-white px-6 py-2 mx-4 hover:bg-primary-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span>Pinjam buku ini</span>
                                </div>
                                <div aria-labelledby="modal-title" aria-modal="true" class="fixed z-50 inset-0"
                                    role="dialog" x-show="chooseBookLocation">
                                    <div
                                        class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                            aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                            aria-hidden="true">​</span>
                                        <div @click.outside="chooseBookLocation = false"
                                            style="max-height: 36rem!important;"
                                            class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-5xl w-full">

                                            <form action="/cart"
                                                class="needs-validation" method="POST">
                                                <input type="hidden" name="_token"
                                                    value="5LV0lKK2CfjICtUPmnzHOkJwiEbCCVh4xCkXxOny"> <input
                                                    type="hidden" name="catalog_id" value="288536">

                                                <div class="bg-white p-4">
                                                    <div
                                                        class="flex items-center justify-between mb-4 text-sm lg:text-base font-medium">
                                                        <h3>Form Peminjaman Buku</h3>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="text-primary-400 animate-bounce h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z">
                                                            </path>
                                                        </svg>
                                                    </div>

                                                    <ul class="grid grid-cols-1 w-full gap-2 lg:gap-4 md:grid-cols-2">



                                                        <li>
                                                            <input type="radio" id="0" disabled=""
                                                                name="location_id" value="6"
                                                                class="hidden peer">
                                                            <label for="0"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta - Cikini</div>
                                                                    <div class="mt-2 w-full text-xs">Jln. Cikini Raya
                                                                        No. 73, Komplek Taman Ismail marzuki, Jakarta
                                                                        Pusat</div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>



                                                        <li>
                                                            <input type="radio" id="1" disabled=""
                                                                name="location_id" value="8"
                                                                class="hidden peer">
                                                            <label for="1"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta - PDS HB Jassin</div>
                                                                    <div class="mt-2 w-full text-xs">Komp Taman Ismail
                                                                        Marzuki Jalan Cikini Raya 73</div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>



                                                        <li>
                                                            <input type="radio" id="2" disabled=""
                                                                name="location_id" value="11"
                                                                class="hidden peer">
                                                            <label for="2"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta Barat - Tanjung Duren</div>
                                                                    <div class="mt-2 w-full text-xs">Jalan Tanjung
                                                                        Duren
                                                                        Barat Raya No. 36</div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>



                                                        <li>
                                                            <input type="radio" id="3" disabled=""
                                                                name="location_id" value="12"
                                                                class="hidden peer">
                                                            <label for="3"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta Timur - Jatinegara</div>
                                                                    <div class="mt-2 w-full text-xs">Jalan Jatinegara
                                                                        Timur IV, Rawa Bunga, Jatinegara</div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>



                                                        <li>
                                                            <input type="radio" id="4" disabled=""
                                                                name="location_id" value="13"
                                                                class="hidden peer">
                                                            <label for="4"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta Utara - Koja</div>
                                                                    <div class="mt-2 w-full text-xs">Jl. Logistik Raya
                                                                        No. 2 Kelurahan Tugu Selatan Kecamatan Koja
                                                                        Jakarta Utara</div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>



                                                        <li>
                                                            <input type="radio" id="5" disabled=""
                                                                name="location_id" value="14"
                                                                class="hidden peer">
                                                            <label for="5"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta Pusat - Petojo Enclek</div>
                                                                    <div class="mt-2 w-full text-xs">Jl. Tanah Abang 1
                                                                        Kebon Jahe Jakarta Pusat</div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>



                                                        <li>
                                                            <input type="radio" id="6" disabled=""
                                                                name="location_id" value="15"
                                                                class="hidden peer">
                                                            <label for="6"
                                                                class=" opacity-25  inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta Selatan - Gandaria Tengah
                                                                    </div>
                                                                    <div class="mt-2 w-full text-xs">Jl. Gandaria
                                                                        Tengah
                                                                        V No.3, RT.2/RW.1, Kramat Pela, Kby. Baru, Kota
                                                                        Jakarta Selatan, Daerah Khusus Ibukota Jakarta
                                                                        12130, Indonesia </div>
                                                                </div>
                                                                <svg class="w-4 h-4 ms-3 shrink-0" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 10">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                                                                </svg>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="justify-center bg-gray-50 px-4 py-3 flex items-center gap-2 lg:gap-4 text-sm lg:text-base">
                                                    <button @click="chooseBookLocation = false" type="button"
                                                        class="w-full border border-primary-500 rounded-lg px-3 lg:px-6 py-1 lg:py-2 text-primary-500 hover:bg-gray-100">
                                                        Kembali
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border">

                        <div class="grid grid-cols-1 lg:grid-cols-2 border-b">
                            <div class="rounded-tl-lg bg-gray-50 p-4 lg:p-8">
                                <div class="relative">
                                    <img data-src="{{ asset('storage/buku/' . $buku->gambar_buku) }}"
                                        src="images/no-images.png"
                                        onerror="this.onerror=null; this.src='/assets/img/no-images.png'"
                                        class="lazyload rounded object-center object-cover flex justify-center min-w-full  h-[30rem] rounded-lg shadow-lg object-cover object-center"
                                        alt="{{ $buku->title }}">

                                    <div x-data="{ previewFullBookCover: false }" x-cloak="" class="absolute bottom-4 right-4">
                                        <div
                                            class="rounded bg-black/50 text-white p-2 cursor-pointer hover:bg-black/70">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15">
                                                </path>
                                            </svg>
                                        </div>

                                        <div x-show="previewFullBookCover" aria-labelledby="modal-title"
                                            aria-modal="true" class="fixed z-50 inset-0" role="dialog">
                                            <div
                                                class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                    aria-hidden="true"></div>
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                    aria-hidden="true">​</span>
                                                <div @click.outside="previewFullBookCover = false"
                                                    style="max-height: 36rem!important;"
                                                    class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:w-auto w-auto">
                                                    <div class="bg-white p-4">
                                                        <img data-src="https://koleksiperpus.jakarta.go.id/dispusip/uploaded_files/sampul_koleksi/original/Monograf/288536.jpeg"
                                                            src="images/no-images.png"
                                                            onerror="this.onerror=null; this.src='/assets/img/no-images.png'"
                                                            class="lazyload rounded object-center object-cover w-full h-[30rem]"
                                                            alt="{{ $buku->title }}">
                                                    </div>
                                                    <div
                                                        class="justify-center bg-gray-50 px-4 py-3 flex items-center gap-2 lg:gap-4 text-sm lg:text-base">
                                                        <button @click="previewFullBookCover = false" type="button"
                                                            class="w-full border border-primary-500 rounded-lg px-3 lg:px-6 py-1 lg:py-2 text-primary-500 hover:bg-gray-100">
                                                            Kembali
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 lg:p-6">
                                <h2 class="text-lg lg:text-2xl font-bold capitalize">{{ $buku->title }}</h2>
                                <h4 class="text-gray-500 text-sm lg:text-base mt-1">Fidela Asa, JJ (Pengarang) ; Tim
                                    Elementa (editor)</h4>

                                <div class="flex flex-wrap items-center gap-2 mt-4">
                                    <a href="/book?keyword=Bacaan%20kanak%2Fkanak"
                                        class="cursor-pointer">
                                        <div class="rounded-lg bg-orange-50 text-orange-500 px-2 py-1">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 6h.008v.008H6V6Z"></path>
                                                </svg>
                                                <div class="text-sm capitalize">Bacaan kanak/kanak</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="flex items-center gap-2">
                                    </div>
                                </div>

                                <div class="mt-4 lg:mt-6 text-sm grid grid-flow-row rounded border divide-y">
                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Edisi</span>
                                        <span>-</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Penerbit</span>
                                        <span>Bekasi : Elementa Media, 2023</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Deskripsi Fisik</span>
                                        <span>66 halaman : ilustrasi berwarna ; 21 cm</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">ISBN</span>
                                        <span>9786230955853</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Subjek</span>
                                        <span>Bacaan kanak/kanak</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Bahasa</span>
                                        <span> Indonesia
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Call Number</span>
                                        <span>028.5 FID p</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="rounded-full h-2 w-2 bg-orange-500"></div>
                                <h4 class="font-medium text-lg">Sinopsis:</h4>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">
                                </div>

                                <div class="rounded-lg p-4 bg-gray-50 border border-gray-200 text-gray-500">
                                    <span class="block font-medium text-sm line-clamp-2">Koleksi belum dapat dipinjam
                                        atau dibaca di tempat</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
    </div>
    </main>
    </div>
</x-client-app>
