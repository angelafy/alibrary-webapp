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
                        <div class="my-4 lg:my-4">
                            <div class="flex justify-between gap-2 lg:gap-4">
                                <!-- Search Bar -->
                                <div class="w-full">
                                    <label for="peminjaman-search"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <form action="{{ route('pinjam.index') }}" method="GET">
                                            <input name="search" type="search" id="peminjaman-search"
                                                class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                                                value="{{ request('search') }}" placeholder="Cari Kode Peminjaman">
                                            <!-- Hidden input untuk mempertahankan filter status jika ada -->
                                            @if (request('status'))
                                                <input type="hidden" name="status" value="{{ request('status') }}">
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <!-- Filter Button -->
                                <div x-data="{ filterModal: false }">
                                    <div @click="filterModal = true"
                                        class="flex items-center cursor-pointer gap-2 text-primary-500 rounded-lg text-sm p-2 lg:px-6 lg:py-2 border border-primary-500 hover:bg-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z">
                                            </path>
                                        </svg>
                                        <span class="hidden lg:block font-medium">Filter</span>
                                    </div>

                                    <!-- Modal Filter -->
                                    <div x-data="{ selectedStatus: '{{ request('status', 'all') }}' }">
                                        <div class="fixed z-50 inset-0 overflow-y-auto" x-show="filterModal" x-cloak>
                                            <div
                                                class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                    aria-hidden="true"></div>
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                    aria-hidden="true">​</span>
                                                <div @click.outside="filterModal = false"
                                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-full lg:max-w-4xl">
                                                    <div class="bg-white p-4">
                                                        <!-- Modal Header -->
                                                        <div class="mb-1">
                                                            <div
                                                                class="flex items-center justify-end font-medium text-sm lg:text-base">
                                                                <div @click="filterModal = false">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="cursor-pointer h-4 w-4" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Filter Status -->
                                                        <div class="my-4">
                                                            <div class="font-medium text-sm lg:text-base">Filter
                                                                Berdasarkan Status</div>
                                                            <select id="status" name="status"
                                                                x-model="selectedStatus"
                                                                class="form-select p-2 w-full border-2 border-gray-100 bg-gray-100 pl-6 rounded-lg text-xs lg:text-sm">
                                                                <option value="all">Semua Status</option>
                                                                <option value="0">Pending Persetujuan</option>
                                                                <option value="1">Disetujui</option>
                                                                <option value="2">Dipinjam</option>
                                                                <option value="3">Dikembalikan</option>
                                                                <option value="4">Terlambat</option>
                                                                <option value="5">Hilang</option>
                                                                <option value="6">Pending Pengembalian</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div
                                                        class="flex flex-nowrap items-center justify-center gap-2 bg-gray-50 px-4 py-3">
                                                        <button type="button"
                                                            @click="window.location.href = '{{ route('pinjam.index') }}?status=' + selectedStatus + '&search={{ request('search') }}'"
                                                            class="w-full flex justify-center py-2 px-3 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                                            Terapkan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mx-auto">
                            @forelse ($peminjamans as $item)
                                <div class="rounded-lg border p-3 lg:p-4 mb-4">
                                    <h1 class="font-bold">
                                        {{-- #{{ $item->kode_peminjaman }} - {{ $item->tgl_pinjam->format('d M Y') : 'Belum Disetujui'  }} --}}
                                        #{{ $item->kode_peminjaman }} -
                                        {{ $item->tgl_pinjam ? $item->tgl_pinjam->format('d M Y') : 'Belum Disetujui' }}
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
                                                            return 'bg-blue-100 text-blue-800'; // Dipinjam
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
                                                <form action="{{ route('peminjaman.kembalikan', $item->id) }}"
                                                    method="POST" class="kembalikanForm">
                                                    @csrf
                                                    <button type="submit" @class([
                                                        'py-2 px-4 lg:px-6 rounded-lg border text-xs font-medium line-clamp-1',
                                                        'border-primary-700 text-primary-700 hover:bg-primary-50' =>
                                                            $item->status === 2,
                                                        'border-gray-300 text-gray-400 cursor-not-allowed bg-gray-50' =>
                                                            $item->status !== 2,
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
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('form.kembalikanForm button[type="button"]');
                buttons.forEach((button) => {
                    button.addEventListener('click', function() {
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
