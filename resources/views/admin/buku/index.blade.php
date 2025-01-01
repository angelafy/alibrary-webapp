<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            {{-- <td>{{ $kandang->pemilik->name ?? 'Tidak Ada Pemilik' }}</td> --}}

                            <h2 class="page-title">
                                {{ $judul }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="{{ route('bukus.excel') }}" class="btn">
                                        Cetak
                                    </a>
                                </span>
                                <a href="{{ route('bukus.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah {{ $main }}
                                </a>
                                <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-tambah-hewan" aria-label="Tambah Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="row row-cards">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        {{-- Show --}}
                                        <div class="mx-2 d-inline-block">
                                            <select id="pageLength" class="form-control form-control-sm"
                                                style="width:70px">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        {{-- entries --}}
                                    </div>
                                    <div class="ms-auto text-muted">
                                        {{-- Search: --}}
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" id="searchInput" class="form-control form-control-sm"
                                                placeholder="Cari Buku" aria-label="Search supplier">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable" id="tableBuku">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 15%;">Kode</th>
                                            <th style="width: 30%;">Judul</th>
                                            {{-- <th style="width: 15%;">Author</th> --}}
                                            {{-- <th>Publisher</th> --}}
                                            <th style="width: 20%;">Tahun Terbit</th>
                                            {{-- <th>Deskripsi</th>
                                            <th>Sinopsis</th> --}}
                                            <th style="width: 20%;">Genre</th>
                                            {{-- <th>Stock</th> --}}
                                            <th class="w-1" style="width: 30%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p id="tableInfo" class="m-0 text-muted"></p>
                                <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Genre Tracker</h3>
                                <table class="table table-sm table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th class="text-end">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($genreTracker as $genre)
                                            <tr>
                                                <td>
                                                    <div class="progressbg">
                                                        <div class="progress progressbg-progress">
                                                            @php
                                                                $percentage =
                                                                    $totalGenres > 0
                                                                        ? ($genre->jumlah / $totalGenres) * 100
                                                                        : 0;
                                                            @endphp
                                                            <div class="progress-bar bg-success-lt"
                                                                style="width: {{ $percentage }}%" role="progressbar"
                                                                aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                aria-label="{{ $percentage }}% Complete">
                                                                <span class="visually-hidden">{{ $percentage }}%
                                                                    Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="progressbg-text">{{ $genre->nama_genre }}</div>
                                                    </div>
                                                </td>
                                                <td class="w-1 fw-bold text-end">{{ $genre->jumlah }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center">Data genre tidak tersedia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br />
                        {{-- tahun tracker --}}
                        <div class="card accordion" id="dashboardAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingYear">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseYear"
                                        aria-expanded="false" aria-controls="collapseYear">
                                        <h3 class="card-title m-0">Tahun Tracker</h3>
                                    </button>
                                </h2>
                                <div id="collapseYear" class="accordion-collapse collapse"
                                    aria-labelledby="headingYear" data-bs-parent="#dashboardAccordion">
                                    <div class="accordion-body">
                                        <table class="table table-sm table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Tahun</th>
                                                    <th class="text-end">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($tahunTracker as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="progressbg">
                                                                <div class="progress progressbg-progress">
                                                                    @php
                                                                        $percentage =
                                                                            $totalBooks > 0
                                                                                ? ($item->jumlah / $totalBooks) * 100
                                                                                : 0;
                                                                    @endphp
                                                                    <div class="progress-bar bg-primary-lt"
                                                                        style="width: {{ $percentage }}%"
                                                                        role="progressbar"
                                                                        aria-valuenow="{{ $percentage }}"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        aria-label="{{ $percentage }}% Complete">
                                                                        <span
                                                                            class="visually-hidden">{{ $percentage }}%
                                                                            Complete</span>
                                                                    </div>
                                                                </div>
                                                                <div class="progressbg-text">{{ $item->tahun }}</div>
                                                            </div>
                                                        </td>
                                                        <td class="w-1 fw-bold text-end">{{ $item->jumlah }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center">Data tracker tidak
                                                            tersedia</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
