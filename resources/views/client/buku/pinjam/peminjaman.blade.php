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
                                        {{-- #{{ $item->kode_peminjaman }} - {{ $item->tgl_pinjam->format('d M Y') : 'Belum Disetujui'  }} --}}
                                        #{{ $item->kode_peminjaman }} - {{ $item->tgl_pinjam ? $item->tgl_pinjam->format('d M Y') : 'Belum Disetujui' }}
                                    </h1>
                                    <div class="text-sm mt-1">
                                        {{ $item->tgl_kembali ? 'Tanggal Kembali: ' . $item->tgl_kembali->format('d M Y') : 'Belum Dikembalikan' }}
                                    </div>

                                    <div class="flex items-center justify-between mt-4">
                                        @php
                                            if (!function_exists('getStatusClass')) {
                                                function getStatusClass($status)
                                                {
                                                    switch ($status) {
                                                        case 0:
                                                            return 'bg-yellow-100 text-yellow-800'; // Pending
                                                        case 1:
                                                            return 'bg-blue-100 text-blue-800'; // Disetujui
                                                        case 2:
                                                            return 'bg-green-100 text-green-800'; // Dipinjam
                                                        case 3:
                                                            return 'bg-green-100 text-green-800'; // Dikembalikan
                                                        case 4:
                                                            return 'bg-red-100 text-red-800'; // Terlambat
                                                        case 5:
                                                            return 'bg-gray-300 text-gray-600'; // Hilang
                                                        case 6:
                                                            return 'bg-yellow-100 text-yellow-800'; // Hilang
                                                        default:
                                                            return 'bg-gray-200 text-gray-500'; // Tidak diketahui
                                                    }
                                                }
                                            }
                                        @endphp

                                        <div
                                            class="{{ getStatusClass($item->status) }} text-xs font-medium inline-flex items-center px-3 py-1 rounded-lg capitalize h-auto">
                                            @switch($item->status)
                                                @case(0)
                                                    Pending Persetujuan
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

                                                @case(6)
                                                    Pending Pengembalian
                                                @break

                                                @default
                                                    Tidak Diketahui
                                            @endswitch
                                        </div>
                                        <div class="flex space-x-2">
                                            <!-- Tombol Bayar Denda (Hanya jika ada denda dan belum dibayar) -->
                                            @if ($item->denda && !$item->denda->status)
                                                <a href="{{ route('peminjaman.detail', $item->id) }}" 
                                                    class="py-2 px-4 lg:px-6 rounded-lg border border-primary-700 text-xs text-primary-700 font-medium line-clamp-1 hover:bg-primary-50">
                                                    Bayar Denda
                                                </a>
                                            @else
                                                <!-- Tombol Kembalikan Buku jika tidak ada denda -->
                                                <form action="{{ route('peminjaman.kembalikan', $item->id) }}" method="POST" class="kembalikanForm">
                                                    @csrf
                                                    <button type="submit" 
                                                        @class([
                                                            'py-2 px-4 lg:px-6 rounded-lg border text-xs font-medium line-clamp-1',
                                                            'border-primary-700 text-primary-700 hover:bg-primary-50' => $item->status === 2,
                                                            'border-gray-300 text-gray-400 cursor-not-allowed bg-gray-50' => $item->status !== 2,
                                                        ])>
                                                        Kembalikan
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <!-- Tombol Lihat Detail -->
                                            <a href="{{ route('peminjaman.detail', $item->id) }}"
                                                class="py-2 px-4 lg:px-6 rounded-lg border border-primary-700 text-xs text-primary-700 font-medium line-clamp-1 hover:bg-primary-50">
                                                Lihat Detail
                                            </a>
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
                            <nav role="navigation" aria-label="Pagination Navigation"
                                class="flex items-center justify-between">
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
                                            Menampilkan <span class="font-medium">{{ $peminjamans->firstItem() }}</span>
                                            hingga
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
            </main>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const buttons = document.querySelectorAll('form.kembalikanForm button[type="button"]');
                buttons.forEach((button) => {
                    button.addEventListener('click', function () {
                        const form = button.closest('form'); // Ambil form terkait
                        Swal.fire({
                            title: 'Konfirmasi',
                            text: 'Apakah Anda yakin ingin mengembalikan buku ini?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#dc3545',
                            confirmButtonText: 'Ya, kembalikan!',
                            cancelButtonText: 'Tidak, batalkan!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Kirim form jika dikonfirmasi
                            }
                        });
                    });
                });
            });
        </script>
    </x-client-app>
