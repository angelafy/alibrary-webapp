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
                                            class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-3 py-1 rounded-lg capitalize h-auto">
                                            {{ $item->status ? 'Dikembalikan' : 'Dipinjam' }}
                                        </div>
                                        <button @click="violationDetailModal{{ $item->id }} = true"
                                            class="py-2 px-4 lg:px-6 rounded-lg border border-primary-700 text-xs text-primary-700 font-medium line-clamp-1 hover:bg-primary-50">
                                            Lihat Detail
                                        </button>
                                    </div>

                                    {{-- <!-- Modal Detail -->
                                    <div class="fixed z-50 inset-0" aria-labelledby="modal-title" role="dialog"
                                        aria-modal="true" x-show="violationDetailModal{{ $item->id }}">
                                        <div
                                            class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                aria-hidden="true"></div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                aria-hidden="true">&#8203;</span>
                                            <div @click.outside="violationDetailModal{{ $item->id }} = false"
                                                style="max-height: 36rem!important;"
                                                class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-2xl w-full">
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6">
                                                    <span class="text-sm lg:text-lg font-medium">
                                                        Detil Peminjaman
                                                    </span>
                                                </div>

                                                <div class="px-4 py-3 sm:px-6">
                                                    @foreach ($item->detailPeminjaman as $detail)
                                                        <div class="my-2 flex items-center gap-2 justify-between">
                                                            <span class="text-xs lg:text-sm">Nama Buku:</span>
                                                            <span class="font-medium text-xs lg:text-sm">{{ $detail->buku->nama }}</span>
                                                        </div>
                                                        <div class="my-2 flex items-center gap-2 justify-between">
                                                            <span class="text-xs lg:text-sm">Jumlah:</span>
                                                            <span class="font-medium text-xs lg:text-sm">{{ $detail->jumlah }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button @click="violationDetailModal{{ $item->id }} = false" type="button"
                                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm lg:text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Kembali
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            @empty
                                <p class="text-center">Tidak ada peminjaman untuk ditampilkan.</p>
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
