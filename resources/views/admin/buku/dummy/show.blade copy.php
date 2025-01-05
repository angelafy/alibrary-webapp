<x-app>
    <div class="page-body">
        <div class="card container-xl">
            <div class="accordion" id="loanDetailsAccordion">
                <!-- Loan Details Accordion Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#loanDetailsContent">
                            <h3 class="mb-0">{{ $data['judul'] }}</h3>
                        </button>
                    </h2>
                    <div id="loanDetailsContent" class="accordion-collapse collapse show" data-bs-parent="#loanDetailsAccordion">
                        <div class="accordion-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kode Peminjaman</div>
                                    <div class="input-icon">
                                        <input type="text" value="{{ $peminjaman->kode_peminjaman }}" class="form-control" readonly />
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
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
                        </div>
                    </div>
                </div>

                <!-- Borrowed Books Accordion Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#borrowedBooksContent">
                            <h4 class="mb-0">Detail Buku yang Dipinjam</h4>
                        </button>
                    </h2>
                    <div id="borrowedBooksContent" class="accordion-collapse collapse" data-bs-parent="#loanDetailsAccordion">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="card mt-3">
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-link">Kembali</a>
                        @if ($peminjaman->status == 0)
                            <a href="#" class="btn btn-primary ms-auto" onclick="approvePeminjaman('{{ $peminjaman->id }}'); return false;">
                                <i class="fa-solid fa-square-check me-2"></i>Setujui Peminjaman
                            </a>
                            <a href="#" class="btn btn-danger ms-2" onclick="rejectPeminjaman('{{ $peminjaman->id }}'); return false;">
                                <i class="fa-solid fa-square-xmark me-2"></i>Tolak Peminjaman
                            </a>
                        @endif
                        @if ($peminjaman->status == 6)
                            <a href="#" class="btn btn-success ms-auto" onclick="approveReturn('{{ $peminjaman->id }}'); return false;">
                                <i class="fa-solid fa-square-check me-2"></i>Setujui Pengembalian
                            </a>
                            <a href="#" class="btn btn-danger ms-2" onclick="rejectReturn('{{ $peminjaman->id }}'); return false;">
                                <i class="fa-solid fa-square-xmark me-2"></i>Tolak Pengembalian
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Add CSRF token to all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function approvePeminjaman(id) {
                Swal.fire({
                    title: 'Konfirmasi Persetujuan',
                    text: 'Apakah Anda yakin ingin menyetujui peminjaman ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Setuju',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#198754'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/peminjaman/${id}/approve`,
                            type: 'POST',
                            data: {
                                _method: 'PATCH'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Peminjaman telah disetujui'
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                                });
                            }
                        });
                    }
                });
            }

            function rejectPeminjaman(id) {
                Swal.fire({
                    title: 'Konfirmasi Penolakan',
                    text: 'Apakah Anda yakin ingin menolak peminjaman ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Tolak',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#dc3545'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/peminjaman/${id}/reject`,
                            type: 'POST',
                            data: {
                                _method: 'PATCH'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Peminjaman telah ditolak'
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                                });
                            }
                        });
                    }
                });
            }

            function approveReturn(id) {
                Swal.fire({
                    title: 'Konfirmasi Pengembalian',
                    text: 'Apakah Anda yakin ingin menyetujui pengembalian ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Setuju',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#198754'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/peminjaman/${id}/return`,
                            type: 'POST',
                            data: {
                                _method: 'PATCH'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Pengembalian telah disetujui'
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                                });
                            }
                        });
                    }
                });
            }

            function rejectReturn(id) {
                Swal.fire({
                    title: 'Konfirmasi Penolakan',
                    text: 'Apakah Anda yakin ingin menolak pengembalian ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Tolak',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#dc3545'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/peminjaman/${id}/reject`,
                            type: 'POST',
                            data: {
                                _method: 'PATCH'
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Pengembalian telah ditolak'
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                                });
                            }
                        });
                    }
                });
            }
        </script>
    @endpush
</x-app>