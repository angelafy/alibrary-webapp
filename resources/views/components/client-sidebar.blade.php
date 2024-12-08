<aside class="scroll-container hidden lg:block w-1/6 border-r fixed left-0 top-0 h-screen py-6 overflow-y-auto z-10">
    <a href="{{ route('home') }}" class="flex items-center justify-center">
        <img src="{{ asset('static/logo.png') }}" style="height: 29px; width: auto;" alt="" class="mx-auto">
    </a>

    <div class="mt-6 flex flex-col gap-y-1 text-gray-500 fill-gray-500 text-sm">

        <a href="{{ route('home') }}"
            class="flex items-center space-x-2 p-2 hover:bg-gray-50 hover:text-primary-500 pl-4 lg:pl-6  {{ Route::is('home') ? 'border-l-4 border-l-primary-600 text-primary-600' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span>Beranda</span>
        </a>

        <a href="{{ route('bukuClient.index') }}"
            class="flex items-center space-x-2 p-2 hover:bg-gray-50 hover:text-primary-500 pl-4 lg:pl-6 {{ Route::is('bukuClient.index') ? 'border-l-4 border-l-primary-600 text-primary-600' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                </path>
            </svg>
            <span >Daftar Koleksi Buku</span>
            {{-- <span
            class="hidden xl:flex items-center justify-center px-2 py-1 text-xs font-medium leading-none text-white bg-primary-600 rounded-full animate-pulse">Baru</span> --}}
        </a>

        <a href="https://perpustakaan.jakarta.go.id/transaction"
            class="flex items-center space-x-2 p-2 hover:bg-gray-50 hover:text-primary-500 pl-4 lg:pl-6 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            <span>History Peminjaman</span>
        </a>

        <a href="https://perpustakaan.jakarta.go.id/mobile-library"
            class="flex items-center space-x-2 p-2 hover:bg-gray-50 hover:text-primary-500 pl-4 lg:pl-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                </path>
            </svg>
            <span>Jadwal Pengembalian</span>
        </a>

        <a href="https://perpustakaan.jakarta.go.id/account"
            class="flex items-center space-x-2 p-2 hover:bg-gray-50 hover:text-primary-500 pl-4 lg:pl-6 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span>Tentang Akun</span>
        </a>
    </div>
</aside>
