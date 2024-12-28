<x-client-app>
    <div class="flex min-h-screen relative">
        <header class="w-full z-50 fixed lg:hidden"></header>
        <main class="w-full lg:w-4/6 mx-auto p-4 mb-16 lg:mb-0">
            <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50"></div>

            <div class="min-h-screen">
                <section class="relative mb-20">
                    <div class="rounded-lg border">
                        <div class="grid grid-cols-1 lg:grid-cols-2 border-b p-4">
                            <div>
                                <h2 class="text-lg lg:text-2xl font-bold capitalize">Detail Peminjaman</h2>
                                <h4 class="text-gray-500 text-sm lg:text-base mt-1"></h4>
                            </div>
                            <div class="relative flex flex-wrap items-center gap-2 mt-4 lg:mt-0">
                                <a href="https://perpustakaan.jakarta.go.id/book?keyword=Bacaan%20kanak%2Fkanak"
                                    class="cursor-pointer">
                                    <div class="absolute top-0 right-0 mt-2 mr-2 text-sm capitalize text-right">
                                        <div class="rounded-lg bg-orange-50 text-orange-500 px-2 py-1">
                                            #{{ $peminjaman->kode_peminjaman }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Card untuk Tabel Info Buku -->
                        <div class="mt-4 lg:mt-6 bg-white rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-4">Informasi Buku</h3>
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

                        <!-- Card untuk Sinopsis -->
                        <div class="mt-4 lg:mt-6 bg-white rounded-lg p-4">
                            <div class="flex items-center space-x-2">
                                <div class="rounded-full h-2 w-2 bg-orange-500"></div>
                                <h4 class="font-medium text-lg">Pesan:</h4>
                            </div>
                            <div class="mt-4">
                                <div class="rounded-lg p-4 bg-gray-50 border border-gray-200 text-gray-500">
                                    <span class="block font-medium text-sm line-clamp-2">asd</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kembali Button -->
                    <div class="flex items-center justify-start gap-4 cursor-pointer rounded-lg bg-primary-500 text-white px-4 py-2 mt-4 hover:bg-primary-700"
                        onclick="window.history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="text-sm">Kembali</span>
                    </div>
                </section>
            </div>
        </main>
    </div>
</x-client-app>
