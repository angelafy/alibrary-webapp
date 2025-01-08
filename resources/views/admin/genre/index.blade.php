<x-app>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                {{ $judul }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="sad" class="btn">
                                        Cetak
                                    </a>
                                </span>
                                <a href="{{ route('genre.create') }}"
                                    class="btn btn-primary d-none d-sm-inline-block">
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
                                    data-bs-target="#modal-tambahData" aria-label="Tambah Produk">
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


            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Genre</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    {{-- Show --}}
                                    <div class="mx-2 d-inline-block">
                                        <select id="pageLength" class="form-control form-control-sm" style="width:70px">
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
                                            placeholder="Cari Penerbit" aria-label="Search supplier">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="tableGenre">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 15%;">Kode</th>
                                        <th style="width: 30%;">Nama</th>
                                        <th style="width: 50%;">Deskripsi</th>
                                        <th class="w-1" style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p id="tableInfo" class="m-0 text-muted"></p>
                            <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
