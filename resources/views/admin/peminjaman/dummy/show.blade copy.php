<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $data['judul'] }}</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Kode Peminjaman</div>
                            <div class="input-icon">
                                <input type="text" value="{{ $peminjaman->kode_peminjaman }}" class="form-control"
                                    readonly />
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
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
                            <div class="datagrid-title">Nama Peminjam</div>
                            <div class="datagrid-content">{{ $peminjaman->user->nama }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content">
                                @switch($peminjaman->status)
                                    @case(0)
                                        <span class="badge bg-yellow">Menunggu Persetujuan</span>
                                    @break

                                    @case(1)
                                        <span class="badge bg-green">Disetujui</span>
                                    @break

                                    @case(2)
                                        <span class="badge bg-blue">Dipinjam</span>
                                    @break

                                    @case(3)
                                        <span class="badge bg-green">Dikembalikan</span>
                                    @break

                                    @case(4)
                                        <span class="badge bg-red">Terlambat</span>
                                    @break

                                    @case(6)
                                        <span class="badge bg-purple">Permintaan Pengembalian</span>
                                    @break

                                    @case(7)
                                        <span class="badge bg-red">Ditolak</span>
                                    @break

                                    @default
                                        <span class="badge bg-secondary">Tidak Diketahui</span>
                                @endswitch
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Peminjaman</div>
                            <div class="datagrid-content">{{ $peminjaman->tgl_pinjam }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Pengembalian</div>
                            <div class="datagrid-content">{{ $peminjaman->tgl_kembali }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Dikembalikan</div>
                            <div class="datagrid-content">{{ $peminjaman->tgl_dikembalikan ?? '-' }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Keterangan</div>
                            <div class="datagrid-content">{{ $peminjaman->keterangan ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="page-body">
                        <div class="accordion" id="loanDetailsAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#borrowedBooksContent">
                                        <h4 class="mb-0">Detail Buku</h4>
                                    </button>
                                </h2>
                                <div id="borrowedBooksContent" class="accordion-collapse collapse"
                                    data-bs-parent="#loanDetailsAccordion">
                                    <div class="accordion-body">
                                        <!-- Controls Section -->
                                        <div class="border-bottom py-3">
                                            <div class="d-flex">
                                                <div class="text-muted">
                                                    <div class="mx-2 d-inline-block">
                                                        <select id="pageLength" class="form-control form-control-sm"
                                                            style="width:70px">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="ms-auto text-muted">
                                                    <div class="ms-2 d-inline-block">
                                                        <input type="text" id="searchInput"
                                                            class="form-control form-control-sm" placeholder="Cari Buku"
                                                            aria-label="Search books">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Table Section -->
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table" id="detailBukuTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Buku</th>
                                                        <th>Judul Buku</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($peminjaman->detailPeminjaman as $index => $detail)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $detail->buku->kode_buku }}</td>
                                                            <td>{{ $detail->buku->title }}</td>
                                                            <td>{{ $detail->buku->penulis->nama_author }}</td>
                                                            <td>{{ $detail->buku->penerbit->nama_penerbit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Footer with Pagination -->
                                        <div class="card-footer d-flex align-items-center">
                                            <p id="tableInfo" class="m-0 text-muted"></p>
                                            <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-link">Kembali</a>
                        @if ($peminjaman->status == 0)
                            <form action="{{ route('peminjaman.approve', $peminjaman->id) }}" method="POST" class="ms-auto">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-square-check me-2"></i>Setujui Peminjaman
                                </button>
                            </form>
                            <form action="{{ route('peminjaman.reject', $peminjaman->id) }}" method="POST" class="ms-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-square-xmark me-2"></i>Tolak Peminjaman
                                </button>
                            </form>
                        @endif
                        @if ($peminjaman->status == 6)
                            <form action="{{ route('peminjaman.return', $peminjaman->id) }}" method="POST" class="ms-auto">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-square-check me-2"></i>Setujui Pengembalian
                                </button>
                            </form>
                            <form action="{{ route('peminjaman.reject', $peminjaman->id) }}" method="POST" class="ms-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-square-xmark me-2"></i>Tolak Pengembalian
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            
            </div>
        </div>
    </div>

        
    @push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle all form submissions
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            if (form.action.includes('/approve') || form.action.includes('/reject') || form.action.includes('/return')) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    let title, text, icon;
                    if (form.action.includes('/approve')) {
                        title = 'Konfirmasi Persetujuan';
                        text = 'Apakah Anda yakin ingin menyetujui?';
                        icon = 'question';
                    } else if (form.action.includes('/reject')) {
                        title = 'Konfirmasi Penolakan';
                        text = 'Apakah Anda yakin ingin menolak?';
                        icon = 'warning';
                    } else if (form.action.includes('/return')) {
                        title = 'Konfirmasi Pengembalian';
                        text = 'Apakah Anda yakin ingin menyetujui pengembalian?';
                        icon = 'question';
                    }
    
                    Swal.fire({
                        title: title,
                        text: text,
                        icon: icon,
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: form.action.includes('/reject') ? '#dc3545' : '#198754'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading state
                            Swal.fire({
                                title: 'Memproses...',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
    
                            // Submit the form
                            fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: new FormData(form)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: data.message,
                                        timer: 1500
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    throw new Error(data.message || 'Terjadi kesalahan');
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: error.message || 'Terjadi kesalahan saat memproses permintaan'
                                });
                            });
                        }
                    });
                });
            }
        });
    });
    </script>
    @endpush
</x-app>
