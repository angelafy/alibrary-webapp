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
                            <div x-data="{
                                chooseBookLocation: false,
                                cart: [],
                                addToCart(book) {
                                    this.cart.push(book);
                                }
                            }" x-cloak class="w-full">
                                <!-- Button to choose book location -->
                                <form id="keranjangForm" method="POST">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                    <div class="flex items-center justify-center gap-2 rounded-lg px-6 py-2 mx-4 select-none {{ $buku->stock > 0 ? 'bg-primary-500 hover:bg-primary-700 cursor-pointer' : 'bg-gray-400 cursor-not-allowed' }} text-white"
                                        @if ($buku->stock > 0) onclick="submitKeranjang(event)" @endif>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 pointer-events-none"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <span
                                            class="pointer-events-none">{{ $buku->stock > 0 ? 'Pinjam buku ini' : 'Stok Habis' }}</span>
                                    </div>
                                </form>

                                <!-- Modal for choosing book location -->
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

                                            <form action="t" class="needs-validation" method="POST">
                                                <div class="bg-white p-4">
                                                    <div
                                                        class="flex items-center justify-between mb-4 text-sm lg:text-base font-medium">
                                                        <h3>Form Peminjaman Buku</h3>
                                                    </div>

                                                    <ul class="grid grid-cols-1 w-full gap-2 lg:gap-4 md:grid-cols-2">
                                                        <li>
                                                            <input type="radio" id="0" name="location_id"
                                                                value="6" class="hidden peer"
                                                                @click="addToCart({ id: 6, name: 'Perpustakaan Jakarta - Cikini' })">
                                                            <label for="0"
                                                                class="inline-flex items-center space-x-4 justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-500 peer-checked:text-primary-500 hover:bg-gray-50">
                                                                <div class="block">
                                                                    <div class="w-full text-sm lg:text-base font-bold">
                                                                        Perpustakaan Jakarta - Cikini</div>
                                                                    <div class="mt-2 w-full text-xs">Jln. Cikini Raya
                                                                        No. 73, Komplek Taman Ismail Marzuki, Jakarta
                                                                        Pusat</div>
                                                                </div>
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
                                        onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
                                        class="lazyload rounded object-center object-cover flex justify-center min-w-full  h-[30rem] rounded-lg shadow-lg object-cover object-center"
                                        alt="{{ $buku->title }}">

                                    <div x-data="{ previewFullBookCover: false }" x-cloak="" class="absolute bottom-4 right-4">
                                        <div
                                            class="rounded bg-black/50 text-white p-2 cursor-pointer hover:bg-black/70">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
                                                            onerror="this.onerror=null; this.src='https://perpustakaan.jakarta.go.id/assets/img/no-images.png'"
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
                                <h4 class="text-gray-500 text-sm lg:text-base mt-1">
                                    {{ $buku->penulis->nama_author ?? 'Unknown Author' }} (Pengarang)</h4>

                                <div class="flex flex-wrap items-center gap-2 mt-4">
                                    <a href="https://perpustakaan.jakarta.go.id/book?keyword=Bacaan%20kanak%2Fkanak"
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
                                                <div class="text-sm capitalize">
                                                    {{ $buku->genre->nama_genre ?? 'Unknown Author' }}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="flex items-center gap-2">
                                    </div>
                                </div>

                                <div class="mt-4 lg:mt-6 text-sm grid grid-flow-row rounded border divide-y">
                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Kode Buku</span>
                                        <span>
                                            {{ $buku->kode_buku ?? 'Unknown Data' }}</span>
                                    </div>
                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">ISBN</span>
                                        <span>{{ $buku->isbn ?? 'Unknown Data' }}</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Penerbit</span>
                                        <span> {{ $buku->penerbit->nama_penerbit ?? 'Unknown Author' }} :
                                            {{ $buku->terbit ?? 'Unknown Author' }}</span>
                                    </div>

                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Deskripsi Fisik</span>
                                        <span> {{ $buku->deskripsi ?? 'Gada Desk' }}</span>
                                    </div>


                                    <div class="grid grid-cols-2 p-2">
                                        <span class="font-medium">Stock</span>
                                        <span>{{ $buku->stock ?? 'Gada Stock' }}</span>
                                    </div>

                                    {{-- <div class="grid grid-cols-2 p-2">
                                            <span class="font-medium">Deskripsi</span>
                                            <span> {{ $buku->deskripsi ?? 'Unknown Data' }}
                                            </span>
                                        </div> --}}

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
                                    <span
                                        class="block font-medium text-sm line-clamp-2">{{ $buku->sinopsis ?? 'Unknown Data' }}</span>
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
<script>
    function submitKeranjang(event, isReject = false) {
    event.preventDefault();

    const title = isReject ? 'Apakah Anda yakin ingin menolak?' : 'Apakah Anda yakin?';
    const text = isReject ? 'Data yang dimasukkan akan ditolak.' :
        'Data yang dimasukkan akan disimpan ke keranjang.';
    const icon = isReject ? 'warning' : 'question';
    const confirmButtonText = isReject ? 'Ya, Tolak' : 'Ya, Setuju';
    const confirmButtonColor = isReject ? '#dc3545' : '#337ab7';
    const cancelButtonText = 'Batal';
    const cancelButtonColor = isReject ? '#dc3545' : '#6c757d';
    
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText,
        confirmButtonColor: confirmButtonColor,
        cancelButtonColor: cancelButtonColor,
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('keranjangForm');
            const formData = new FormData(form);
            fetch("{{ route('keranjang.store') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            confirmButtonColor: '#90EE90' 
                        }).then(() => {
                            window.location.reload(); 
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message,
                            confirmButtonColor: '#337ab7' 
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan!',
                        text: 'Silakan coba lagi nanti.',
                        confirmButtonColor: '#6c757d'
                    });
                    console.error('Error:', error);
                });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Batal!',
                text: 'Data tidak disimpan.',
                confirmButtonColor: '#6c757d' 
            });
        }
    });
}
</script>
