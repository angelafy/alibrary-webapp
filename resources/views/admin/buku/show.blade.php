<x-app>

    <div class="page-body">
        <div class="container-xl">
            <div class="card accordion" id="gambarAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBookDetail">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseBookDetail" aria-expanded="false"
                            aria-controls="collapseBookDetail">
                            <h3 class="card-title m-0">Gambar</h3>
                        </button>
                    </h2>
                    <div id="collapseBookDetail" class="accordion-collapse collapse" aria-labelledby="headingBookDetail"
                        data-bs-parent="#gambarAccordion">
                        <div class="col-md-6 col-lg-12">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card-body p-4 py-5 text-center">
                                        <span class="avatar avatar-xl mb-4 rounded"
                                            style="
                                                background-image: url('{{ $buku->gambar_buku ? asset('storage/buku/' . $buku->gambar_buku) : asset('storage/buku/default.jpg') }}');
                                                background-size: cover;
                                                background-position: center;
                                                width: 100%;
                                                max-width: 500px;
                                                height: auto;
                                                aspect-ratio: 1/1;
                                                border-radius: 50%;
                                            ">
                                        </span>
                                        <h3 class="mb-0">{{ $buku->title }}</h3>
                                        <p class="text-muted">{{ $buku->created_at }}</p>
                                        <p class="mb-3">
                                            <button id="downloadLink" class="btn btn-outline-primary-lt">Download
                                                Gambar</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Buku</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Kode Buku</div>
                            <div class="input-icon">
                                <input type="text" value="{{ $buku->kode_buku }}"
                                    class="form-control" placeholder="Search…" readonly />
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/files -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                        <path
                                            d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                        <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">ISBN</div>
                            <div class="input-icon">
                                <input type="text" value="{{ $buku->isbn }}"
                                    class="form-control" placeholder="Search…" readonly />
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/files -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                        <path
                                            d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                        <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Judul</div>
                            <div class="datagrid-content">{{ $buku->title }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Penulis</div>
                            <div class="datagrid-content">{{ $buku->penulis->nama_author }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Penerbit</div>
                            <div class="datagrid-content">{{ $buku->penerbit->nama_penerbit }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Genre</div>
                            <div class="datagrid-content">{{ $buku->genre->nama_genre }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Stock</div>
                            <div class="datagrid-content">{{ $buku->stock }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Terbit</div>
                            <div class="datagrid-content">{{ $buku->terbit }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Deskripsi</div>
                            <div class="datagrid-content">{{ $buku->deskripsi }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Sinopsis</div>
                            <div class="datagrid-content">{{ $buku->sinopsis }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tgl Data Dibuat</div>
                            <div class="datagrid-content">{{ $buku->created_at }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('bukus.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('downloadLink').addEventListener('click', function(e) {
            e.preventDefault();
            const namafile = '{{ $buku->gambar_buku ? $buku->gambar_buku : 'default.jpg' }}';
            const filePath = '{{ asset('storage/buku/') }}/' + namafile;

            const link = document.createElement('a');
            link.href = filePath;
            link.download = namafile;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
</x-app>
