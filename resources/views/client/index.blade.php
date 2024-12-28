<x-client-app>
    <style>
        .bold-text {
            font-weight: bold;
        }
    </style>

    <body class="font-mulish antialiased overflow-x-hidden text-sm md:text-base">
        <div class="flex min-h-screen relative">
            <header class="w-full z-50 fixed lg:hidden">
                <section id="bottom-navigation" class="lg:hidden fixed inset-x-0 bottom-0 z-10 bg-white border-t-2">
                    <div x-data="{ searchChoiceCard: false }" x-cloak="" @click.outside="searchChoiceCard = false">
                        <div class="text-xs rounded-t bg-gray-100 p-4 shadow" x-show="searchChoiceCard">
                            <div class="flex items-center justify-between mb-4">
                                <div class="font-medium text-sm">
                                    Fitur Lainnya
                                </div>
                                <svg @click="searchChoiceCard = false" xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>

                            <div class="grid grid-cols-2 items-center justify-between gap-2">
                                <a href="https://kios-perpustakaan.jakarta.go.id/?nisn=">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Reservasi Event</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="{{ route('bukuClient.index') }}">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Daftar Koleksi</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="https://perpustakaan.jakarta.go.id/digital-book">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Katalog Sastra</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="https://perpustakaan.jakarta.go.id/e-resources">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z">
                                                </path>
                                            </svg>
                                            <span class="text-xs">E-Resources</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="https://perpustakaan.jakarta.go.id/event?type=Bacajakarta">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Event</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="https://perpustakaan.jakarta.go.id/library/search">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Cari Perpustakaan</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="https://perpustakaan.jakarta.go.id/catalog-requests/create">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Usul Buku</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Agenda Literasi</span>
                                        </div>
                                    </div>
                                </a>

                                <a href="">
                                    <div class="border rounded bg-white p-2 hover:bg-primary-600 hover:text-white">
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                                                </path>
                                            </svg>
                                            <span class="text-xs">Jadwal Pusling</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div id="tabs" class="flex justify-between py-1">
                            <a href="https://perpustakaan.jakarta.go.id"
                                class="font-medium text-primary-400 w-full hover:text-primary-400 justify-center inline-block text-center pt-2 pb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="tab tab-home block text-xs">Beranda</span>
                            </a>
                            <a href="https://perpustakaan.jakarta.go.id/cart"
                                class="text-gray-600 w-full hover:text-primary-400 justify-center inline-block text-center pt-2 pb-1">
                                <div class="relative inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="inline-block mb-1 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="tab tab-loan block text-xs">Keranjang</span>
                            </a>
                            <div @click="searchChoiceCard = !searchChoiceCard" onclick="return false"
                                class="w-full hover:text-primary-400 justify-center inline-block text-center pt-2 pb-1 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="tab tab-explore block text-xs">Jelajahi</span>
                            </div>
                            <a href="https://perpustakaan.jakarta.go.id/transaction"
                                class="text-gray-600 w-full hover:text-primary-400 justify-center inline-block text-center pt-2 pb-1">
                                <div class="relative inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1 h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="tab tab-cart block text-xs">Transaksi</span>
                            </a>
                            <a href="https://perpustakaan.jakarta.go.id/account"
                                class="text-gray-600 w-full hover:text-primary-400 justify-center inline-block text-center pt-2 pb-1">
                                <div class="relative inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mb-1 h-6 w-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="tab tab-account block text-xs">Akun</span>
                            </a>
                        </div>
                    </div>
                </section>
            </header>

            {{-- NAVBAR NDE KENE --}}
            <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
                <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50">
                </div>
                <div class="min-h-screen">

                    <section class="mb-4">
                        <div class="flex items-center gap-4 justify-between">
                            <div>
                                <h3 class="font-bold text-base lg:text-xl">Rekomendasi Buku</h3>
                                <p class="hidden lg:block text-xs lg:text-sm text-gray-600">Temukan inspirasi baca
                                    kamu!</p>
                            </div>
                        </div>

                        <div class="swiper book-recommendation-swiper z-0">
                            <div class="swiper-wrapper py-4 lg:py-6">
                                @foreach ($bukus as $buku)
                                <div class="swiper-slide h-full">
                                    <a href="{{ route('clientBuku.show', $buku->id) }}">
                                        <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                            <img data-src="{{ asset('storage/buku/' . $buku->gambar_buku) }}"
                                                class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                                alt="{{ $buku->title }}">
                                            <div
                                                class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70 p-3 flex flex-col justify-between">
                                                <div class="flex items-center justify-between"></div>
                                                <div
                                                    class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                    <div
                                                        class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                        {{ $buku->genre->nama_genre ?? 'Unknown Genre' }}
                                                    </div>
                                                    <h1
                                                        class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
                                                        {{ $buku->title }}
                                                    </h1>
                                                    <h3 class="text-gray-100 text-xs sm:text-sm line-clamp-1">
                                                        {{ $buku->penulis->nama_author ?? 'Unknown Author' }}<br>
                                                        {{ $buku->penerbit->nama_penerbit ?? 'Unknown Publisher' }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
               
                    </section>

                    <section class="my-8">
                        <div class="flex items-center gap-2 lg:gap-4 justify-between">
                            <div>
                                <h3 class="font-bold text-base lg:text-xl">Our Team Project A Library</h3>
                                <p class="hidden lg:block text-sm text-gray-600">Siapa saja pengembang dibalik Website
                                    A Library ini?</p>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
                            <div class="rounded-lg border relative">
                                <img src="{{ asset('static/amanda.jpg') }}"
                                    class="lazyload w-full h-48 rounded-lg object-center object-cover brightness-50"
                                    onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                    alt="">
                                <div
                                    class="rounded-lg absolute top-0 h-full w-full bg-gradient-to-t from-primary-600/80 p-4 flex flex-col justify-between text-white">
                                    <div>
                                        <div class="capitalize text-sm lg:text-xl font-bold">Product Owner</div>
                                        <div class="text-gray-100 text-xs line-clamp-1">
                                            Amanda Rachmawati
                                        </div>
                                    </div>

                                    <div class="mt-1 flex items-center space-x-2">
                                        <div class="line-clamp-1 w-full capitalize text-xs lg:text-base">
                                            <p><span data-sheets-root="1">1204222081<br></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg border relative">
                                <img src="{{ asset('static/ilmon.jpg') }}"
                                    class="lazyload w-full h-48 rounded-lg object-center object-cover brightness-50"
                                    onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                    alt="">

                                <div
                                    class="rounded-lg absolute top-0 h-full w-full bg-gradient-to-t from-primary-600/80 p-4 flex flex-col justify-between text-white">
                                    <div>
                                        <div class="capitalize text-sm lg:text-xl font-bold">Scrum Master</div>
                                        <div class="text-gray-100 text-xs line-clamp-1">
                                            Ahmad Ilman Nafia
                                        </div>
                                    </div>
                                    <div class="mt-1 flex items-center space-x-2">
                                        <div class="line-clamp-1 w-full capitalize text-xs lg:text-base">
                                            1204220026
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg border relative">
                                <img src="{{ asset('static/angela.jpg') }}"
                                    class="lazyload w-full h-48 rounded-lg object-center object-cover brightness-50"
                                    onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                    alt="">
                                <div
                                    class="rounded-lg absolute top-0 h-full w-full bg-gradient-to-t from-primary-600/80 p-4 flex flex-col justify-between text-white">
                                    <div>
                                        <div class="capitalize text-sm lg:text-xl font-bold">Development Team</div>
                                        <div class="text-gray-100 text-xs line-clamp-1">
                                            Angela Fransisca Yulisiswati
                                        </div>
                                    </div>
                                    <div class="mt-1 flex items-center space-x-2">
                                        <div class="line-clamp-1 w-full capitalize text-xs lg:text-base">
                                            <p>1204220007</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg border relative">
                                <img src="{{ asset('static/sihub.jpg') }}"
                                    class="lazyload w-full h-48 rounded-lg object-center object-cover brightness-50"
                                    onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                    alt="">
                                <div
                                    class="rounded-lg absolute top-0 h-full w-full bg-gradient-to-t from-primary-600/80 p-4 flex flex-col justify-between text-white">
                                    <div>
                                        <div class="capitalize text-sm lg:text-xl font-bold">Development Team</div>
                                        <div class="text-gray-100 text-xs line-clamp-1">
                                            M. Izzul Haq Syihabbudin S.
                                        </div>
                                    </div>
                                    <div class="line-clamp-1 w-full capitalize text-xs lg:text-base">
                                        <p>1204220052</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </section>
        </div>
        </main>

        <aside
            class="scroll-container hidden lg:flex w-1/6 border-l fixed right-0 top-0 h-screen p-4 overflow-y-auto flex-col space-y-4">
            <form class="mx-auto w-full" action="https://perpustakaan.jakarta.go.id/book" method="GET">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input name="keyword" type="search" id="default-search"
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                        value="" placeholder="Cari Judul/Kategori" autofocus="">
                </div>
            </form>

            {{-- <div class=""> --}}
            {{-- <a target="_blank" href="https://perpustakaan.jakarta.go.id/catalog-requests/create"
                            class="flex items-center justify-center space-x-2 text-white bg-primary-700 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-200 font-medium rounded-lg text-xs px-3 py-1.5 cursor-pointer transition ease-in-out hover:-translate-y-1 hover:scale-110">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4"> --}}
            {{-- <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75">
                                </path>
                            </svg>
                            <span class="line-clamp-1">SIGN IN</span>
                        </a>
                    </div>
                </div> --}}

            {{-- <div class="mt-2 justify-center">
                    <h3 class="text-sm mb-2">Ganti Bahasa</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <a href="https://perpustakaan.jakarta.go.id/language/id"
                            class="border text-orange-500 border border-orange-500 bg-orange-50 rounded-lg hover:bg-orange-50 hover:text-orange-500 hover:border-orange-500">
                            <div class="rounded-lg flex items-center justify-center space-x-2 text-center p-3">
                                <img src="images/Flag_of_Indonesia.svg" class="w-6 h-4 rounded border"
                                    alt="">
                                <span>ID</span>
                            </div> --
                        </a>
                        <a href="https://perpustakaan.jakarta.go.id/language/en"
                            class="relative border  rounded-lg hover:bg-orange-50 hover:text-orange-500 hover:border-orange-500">
                            <div class="rounded-lg flex items-center justify-center space-x-2 text-center p-3">
                                <img src="images/Flag_of_the_United_Kingdom.svg" class="w-6 h-4 rounded"
                                    alt="">
                                <span>EN</span>
                            </div>
                            <div
                                class="absolute -top-3 -right-2 rounded px-1 py-0.5 text-xs bg-green-100 text-green-500">
                                v0.25
                            </div>
                        </a>
                    </div>
                </div> --}}
            @guest
                <div class="mb-8">
                    <h3 class="text-sm">Daftar/Masuk ke Akun:</h3>
                    <div class="grid grid-cols-2 gap-2 mt-2 text-xs">
                        <a href="{{ route('register') }}" class="col-span-full border rounded-lg">
                            <div
                                class="rounded-lg flex items-center justify-center space-x-1.5 text-center p-3 bg-gray-50 hover:bg-gray-100">
                                {{-- <svg class="w-4 h-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> --}}
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75">
                                </path>
                                </svg>
                                <span class="bold-text">DAFTAR</span>
                            </div>
                        </a>
                        <a href="{{ route('login') }}" class="col-span-full border rounded-lg">
                            <div
                                class="rounded-lg flex items-center justify-center space-x-1.5 text-center p-3 bg-gray-50 hover:bg-gray-100">
                                {{-- <svg class="w-4 h-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> --}}
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z">
                                </path>
                                </svg>
                                <span class="bold-text">MASUK</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endguest
            @auth
                <div class="mb-8">
                    {{-- <h3 class="text-sm">Daftar/Masuk ke Akun:</h3> --}}
                    <div class="grid grid-cols-2 gap-2 mt-2 text-xs">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"
                            class="col-span-full border rounded-lg">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <div
                                class="rounded-lg flex items-center justify-center space-x-1.5 text-center p-3 bg-gray-50 hover:bg-gray-100">
                                {{-- <svg class="w-4 h-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> --}}
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z">
                                </path>
                                </svg>
                                <span class="bold-text">LOGOUT</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endauth
        </aside>
        </div>
    </body>
</x-client-app>
