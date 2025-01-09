<x-client-app>
    <div class="flex min-h-screen relative">
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
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-1">
                            <span class="">JAKLITERA sudah ada versi mobile lho!</span>
                            <span @click="openMobileAppDownloadLink = true"
                                class="cursor-pointer hover:text-orange-500 underline font-bold">Unduh</span>
                        </div>
                    </div>
                </div>
                <div class="cursor-pointer hover:bg-red-100 rounded-lg p-1" @click="closeMobileAppDownloadInfo">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

                <div class="fixed z-50 inset-0" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                    x-show="openMobileAppDownloadLink">
                    <div class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div @click.outside="openMobileAppDownloadLink = false" style="max-height: 36rem!important;"
                            class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-full lg:max-w-lg">
                            <div class="bg-gray-50 p-4 lg:p-6">
                                <div class="flex items-center justify-between">
                                    <h1 class="font-bold text-primary-600 text-lg">
                                        Unduh JAKLITERA Mobile
                                    </h1>

                                    <div @click="openMobileAppDownloadLink = false"
                                        class="cursor-pointer text-gray-600">
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
                                        <img src="/assets/img/GetItOnGooglePlay_Badge_Web_color_Indonesian.png"
                                            class="h-10 transition ease-in-out hover:-translate-y-1 hover:scale-110"
                                            alt="">
                                    </a>
                                    <a href="https://apps.apple.com/id/app/jaklitera/id6504686405" target="_blank">
                                        <img src="/assets/img/Download_on_the_App_Store_Badge_ID_RGB_blk_100317.svg"
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
                        <h1 class="text-xl font-bold">History Peminjaman</h1>
                        <p class="text-gray-600 text-sm">Yuk lihat kembali history peminjaman kamu</p>
                    </div>
                    <div class="mt-6">
                    </div>
                    <div class="mt-6">
                        <div class="container mx-auto">
                            <h2 class="text-2xl font-semibold mb-4">Detail Peminjaman #{{ $peminjaman->kode_peminjaman }}</h2>
                        
                            <div class="mb-6">
                                <p><strong>Nama Peminjam:</strong> {{ $peminjaman->user->nama }}</p>
                                <p><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tgl_pinjam->format('d M Y') }}</p>
                                <p><strong>Tanggal Kembali:</strong> {{ $peminjaman->tgl_kembali ? $peminjaman->tgl_kembali->format('d M Y') : 'Belum Dikembalikan' }}</p>
                                <p><strong>Status:</strong> 
                                    @if ($peminjaman->status == 2)
                                        <span class="badge bg-warning">Dipinjam</span>
                                    @elseif ($peminjaman->status == 3)
                                        <span class="badge bg-success">Dikembalikan</span>
                                    @elseif ($peminjaman->status == 4)
                                        <span class="badge bg-danger">Terlambat</span>
                                    @elseif ($peminjaman->status == 5)
                                        <span class="badge bg-danger">Hilang</span>
                                    @else
                                        <span class="badge bg-secondary">Pending</span>
                                    @endif
                                </p>
                            </div>
                        
                            <h3 class="text-xl font-semibold mb-4">Buku yang Dipinjam</h3>
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">Judul Buku</th>
                                        <th class="py-2 px-4 border-b">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman->detailPeminjaman as $detail)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $detail->buku->title }}</td>
                                            <td class="py-2 px-4 border-b">{{ $detail->jumlah }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>
            </div>

            <footer
                class="text-sm hidden lg:block mt-12 mb-2 rounded-lg bg-gray-50 self-center p-4 border border-gray-300">
                <div class="flex items-center gap-4 justify-center">
                    <a href="/supports#faqs" class="underline font-medium">
                        FAQ
                    </a>
                    <a href="/supports/privacy-policy"
                        class="underline font-medium">
                        Kebijakan Privasi
                    </a>
                    <a href="/supports" class="underline font-medium">
                        Bantuan
                    </a>
                    <a href="/supports/about-us" class="underline font-medium">
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
