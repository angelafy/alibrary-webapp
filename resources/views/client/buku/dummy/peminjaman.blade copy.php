<x-client-app>
    <div class="flex min-h-screen relative">
        <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">

            <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50">
            </div>
            <div class="min-h-screen">
                <section>
                    <div>
                        <h1 class="text-xl font-bold">History Peminjaman</h1>
                        <p class="text-gray-600 text-sm">Yuk lihat kembali history peminjaman kamu</p>
                    </div>
                    <div class="mt-6">
                    </div>
                    <div class="mt-6">
                        <div class="container mx-auto">
                            @forelse ($peminjamans as $item)
                                <div class="rounded-lg border p-3 lg:p-4 mb-4">
                                    <h1 class="font-bold">
                                        {{ $item->kode_peminjaman }} - {{ $item->tgl_pinjam->format('d M Y') }}
                                    </h1>
                                    <div class="text-sm mt-1">
                                        {{ $item->tgl_kembali ? 'Tanggal Kembali: ' . $item->tgl_kembali->format('d M Y') : 'Belum Dikembalikan' }}
                                    </div>
                    
                                    <div class="flex items-center justify-between mt-4">
                                        <div
                                            class="text-xs font-medium inline-flex items-center px-3 py-1 rounded-lg capitalize h-auto"
                                            :class="{
                                                'bg-gray-100 text-gray-800': $item->status === 0, // Pending
                                                'bg-blue-100 text-blue-800': $item->status === 1, // Disetujui
                                                'bg-yellow-100 text-yellow-800': $item->status === 2, // Dipinjam
                                                'bg-green-100 text-green-800': $item->status === 3, // Dikembalikan
                                                'bg-red-100 text-red-800': $item->status === 4, // Terlambat
                                                'bg-gray-300 text-gray-600': $item->status === 5, // Hilang
                                            }">
                                            @switch($item->status)
                                                @case(0)
                                                    Pending
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
                                                @default
                                                    Tidak Diketahui
                                            @endswitch
                                        </div>
                    
                                        <div class="flex space-x-2">
                                            <button @click="violationDetailModal{{ $item->id }} = true"
                                                class="py-2 px-4 lg:px-6 rounded-lg border border-primary-700 text-xs text-primary-700 font-medium line-clamp-1 hover:bg-primary-50">
                                                Lihat Detail
                                            </button>
                    
                                            <button 
                                                @click="returnItem({{ $item->id }})" 
                                                :disabled="$item->status !== 2" 
                                                class="py-2 px-4 lg:px-6 rounded-lg border text-xs font-medium line-clamp-1"
                                                :class="{
                                                    'border-green-700 text-green-700 hover:bg-green-50': $item->status === 2,
                                                    'border-gray-300 text-gray-500 cursor-not-allowed': $item->status !== 2
                                                }">
                                                Kembalikan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <div class="rounded-lg border p-3 lg:p-4 bg-gray-50">
                                <div class="text-center py-8">
                                    <p class="text-gray-500">Tidak ada history peminjaman.</p>
                                    <a href="{{ route('bukus.index') }}"
                                        class="mt-4 inline-block text-primary-600 hover:text-primary-700">
                                        Cari buku untuk dipinjam
                                    </a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    

                    <div class="mt-4">
                        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                            <!-- Pagination for mobile view -->
                            <div class="flex justify-between flex-1 sm:hidden">
                                <!-- Previous Page -->
                                @if ($peminjamans->onFirstPage())
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                        « Sebelumnya
                                    </span>
                                @else
                                    <a href="{{ $peminjamans->previousPageUrl() }}"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                        Sebelumnya »
                                    </a>
                                @endif
                            </div>

                            <!-- Pagination for desktop view -->
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5">
                                        Menampilkan <span class="font-medium">{{ $peminjamans->firstItem() }}</span> hingga
                                        <span class="font-medium">{{ $peminjamans->lastItem() }}</span> dari <span
                                            class="font-medium">{{ $peminjamans->total() }}</span> hasil
                                    </p>
                                </div>

                                <div>
                                    <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                        <!-- Previous Page -->
                                        @if ($peminjamans->onFirstPage())
                                            <span aria-disabled="true" aria-label="&laquo; Sebelumnya">
                                                <span
                                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                                                    aria-hidden="true">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        @else
                                            <a href="{{ $peminjamans->previousPageUrl() }}"
                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @endif

                                        <!-- Page Numbers -->
                                        @for ($page = 1; $page <= $peminjamans->lastPage(); $page++)
                                            @if ($page == $peminjamans->currentPage())
                                                <span aria-current="page">
                                                    <span
                                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-bold text-orange-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                                                </span>
                                            @else
                                                <a href="{{ $peminjamans->url($page) }}"
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                    aria-label="Go to page {{ $page }}">
                                                    {{ $page }}
                                                </a>
                                            @endif
                                        @endfor

                                        <!-- Next Page -->
                                        @if ($peminjamans->hasMorePages())
                                            <a href="{{ $peminjamans->nextPageUrl() }}" rel="next"
                                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @else
                                            <span
                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 cursor-default">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </nav>
                    </div>
                </section>
            </div>

            <footer
                class="text-sm hidden lg:block mt-12 mb-2 rounded-lg bg-gray-50 self-center p-4 border border-gray-300">
                <div class="flex items-center gap-4 justify-center">
                    <a href="https://perpustakaan.jakarta.go.id/supports#faqs" class="underline font-medium">
                        FAQ
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/supports/privacy-policy"
                        class="underline font-medium">
                        Kebijakan Privasi
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/supports" class="underline font-medium">
                        Bantuan
                    </a>
                    <a href="https://perpustakaan.jakarta.go.id/supports/about-us" class="underline font-medium">
                        Tentang Kami
                    </a>
                </div>
                <div class="text-center mt-4">
                    Copyright © 2022 Dinas Perpustakaan dan Kearsipan Provinsi DKI Jakarta. Seluruh Hak Cipta Dilindungi
                    Undang-Undang.
                </div>

            </footer>
        </main>



    </div>
</x-client-app>
