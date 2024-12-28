<x-client-app>
    <style>
        .bold-text {
            font-weight: bold;
        }
    </style>

    <body class="font-mulish antialiased overflow-x-hidden text-sm md:text-base">
        <div class="flex min-h-screen relative">
 

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
                                <div class="swiper book-recommendation-swiper z-0">
                                    <div class="swiper-wrapper py-4 lg:py-6">
                                        @foreach ($bukus as $buku)
                                            <div class="swiper-slide h-full">
                                                <a href="{{ route('clientBuku.show', $buku->id) }}">
                                                    <div class="relative rounded-xl overflow-hidden cursor-pointer w-full">
                                                        <img data-src="{{ asset('storage/buku/' . $buku->gambar_buku) }}"
                                                            class="lazyload rounded object-center object-cover brightness-110 rounded-lg w-full h-72 sm:h-80 -z-10"
                                                            alt="{{ $buku->title }}">
                                                        <div class="absolute top-0 h-full w-full bg-gradient-to-t from-black/70 p-3 flex flex-col justify-between">
                                                            <div class="flex items-center justify-between"></div>
                                                            <div class="self-center flex flex-col items-center space-y-1 text-center p-2 w-full">
                                                                <div class="max-w-full capitalize line-clamp-1 overflow-x-hidden rounded-lg px-3 font-medium py-1 bg-primary-500/50 text-xs border-primary-500 text-white">
                                                                    {{ $buku->genre->nama_genre ?? 'Unknown Genre' }}
                                                                </div>
                                                                <h1 class="capitalize text-white text-base sm:text-lg font-bold drop-shadow-md line-clamp-1">
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
