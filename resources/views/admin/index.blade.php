<x-app>
    <div class="page">
        <!-- Navbar -->
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
                                {{ $main }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                {{-- <span class="d-none d-sm-inline">
                                    <a href="#" class="btn">
                                        New view
                                    </a>
                                </span> --}}
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block disabled"
                                    aria-disabled="true" tabindex="-1" data-bs-toggle="modal"
                                    data-bs-target="#modal-report">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-settings">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" />
                                    </svg>
                                    Pengaturan
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-report" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
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
                    <div class="row row-deck row-cards">

                        <div class="col-12">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                                            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                                            <path d="M3 6l0 13" />
                                                            <path d="M12 6l0 13" />
                                                            <path d="M21 6l0 13" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ number_format($totalBuku) }} Buku
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ number_format($totalPending) }} Menunggu Persetujuan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-hand-stop">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M8 13v-7.5a1.5 1.5 0 0 1 3 0v6.5" />
                                                            <path d="M11 5.5v-2a1.5 1.5 0 1 1 3 0v8.5" />
                                                            <path d="M14 5.5a1.5 1.5 0 0 1 3 0v6.5" />
                                                            <path
                                                                d="M17 7.5a1.5 1.5 0 0 1 3 0v8.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ number_format($totalPeminjaman) }} Peminjaman
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ number_format($totalDipinjam) }} Buku Dipinjam
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ number_format($totalUsers) }} Users
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ number_format($totalAdmin) }} Admin
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 21l18 0" />
                                                            <path d="M3 10l18 0" />
                                                            <path d="M5 6l7 -3l7 3" />
                                                            <path d="M4 10l0 11" />
                                                            <path d="M20 10l0 11" />
                                                            <path d="M8 14l0 3" />
                                                            <path d="M12 14l0 3" />
                                                            <path d="M16 14l0 3" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        {{ $totalUserPeminjam }} User Peminjam
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ $totalUserPelanggaran }} Pelanggaran
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Traffic Peminjaman</h3>
                                    <div id="chart-peminjaman" class="chart-lg"></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Locations</h3>
                                    <div class="ratio ratio-21x9">
                                        <div>
                                            <div id="map-world" class="w-100 h-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="card-title">User Terbaru</div>
                                </div>
                                <div class="card-table table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Username</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($userAnyar as $user)
                                                <tr>
                                                    <td class="w-1">
                                                        @if ($user->gambar_profile)
                                                            <span class="avatar avatar-sm"
                                                                style="background-image: url({{ asset('storage/' . $user->gambar_profile) }})"></span>
                                                        @else
                                                            <span
                                                                class="avatar avatar-sm">{{ substr($user->name ?? $user->username, 0, 2) }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="td-truncate">
                                                        <div class="text-truncate">
                                                            {{ $user->username }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap text-muted">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada user terbaru.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="mb-3">Status Peminjaman <strong>{{ $totalPeminjaman }} Total
                                                    Peminjaman</strong></p>
                                            <div class="progress progress-separated mb-3">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: {{ ($statusCounts['pending'] / $totalPeminjaman) * 100 }}%"
                                                    aria-label="Pending"></div>
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: {{ ($statusCounts['dipinjam'] / $totalPeminjaman) * 100 }}%"
                                                    aria-label="Dipinjam"></div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: {{ ($statusCounts['dikembalikan'] / $totalPeminjaman) * 100 }}%"
                                                    aria-label="Dikembalikan"></div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: {{ ($statusCounts['terlambat'] / $totalPeminjaman) * 100 }}%"
                                                    aria-label="Terlambat"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto d-flex align-items-center pe-2">
                                                    <span class="legend me-2 bg-primary"></span>
                                                    <span>Pending</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['pending'] }}
                                                    </span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-info"></span>
                                                    <span>Dipinjam</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['dipinjam'] }}
                                                    </span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-success"></span>
                                                    <span>Dikembalikan</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['dikembalikan'] }}
                                                    </span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-warning"></span>
                                                    <span>Terlambat</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['terlambat'] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Status tambahan -->
                                            <div class="row mt-3">
                                                <div class="col-auto d-flex align-items-center pe-2">
                                                    <span class="legend me-2 bg-danger"></span>
                                                    <span>Hilang</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['hilang'] }}
                                                    </span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-secondary"></span>
                                                    <span>Disetujui</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['disetujui'] }}
                                                    </span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-purple"></span>
                                                    <span>Pengembalian</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['pengembalian'] }}
                                                    </span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-dark"></span>
                                                    <span>Ditolak</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">
                                                        {{ $statusCounts['ditolak'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- logs peminjaman --}}
                                <div class="col-12">
                                    <div class="card" style="height: 28rem">
                                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                            <div class="divide-y">
                                                @foreach ($activities as $activity)
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                @if ($activity['user']->gambar_profile)
                                                                    <span class="avatar"
                                                                        style="background-image: url({{ asset('storage/' . $activity['user']->gambar_profile) }})"></span>
                                                                @else
                                                                    <span
                                                                        class="avatar avatar-sm">{{ substr($user->name ?? $user->username, 0, 2) }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="col">
                                                                <div class="text-truncate">
                                                                    <strong>{{ $activity['user_name'] }}</strong>
                                                                    {{ $activity['message'] }}
                                                                </div>
                                                                <div class="text-muted">{{ $activity['created_at'] }}
                                                                </div>
                                                            </div>
                                                            @if (in_array($activity['status'], [0, 6]))
                                                                <div class="col-auto align-self-center">
                                                                    <div class="badge bg-primary"></div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Di view admin/index.blade.php, tambahkan section ini -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="card-title">Aktivitas Admin</div>
                                </div>
                                <div class="card-table table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Admin</th>
                                                <th>Action</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($adminActivities as $activity)
                                                <tr>
                                                    <td class="w-1">
                                                        @if ($activity['user']['gambar_profile'])
                                                            <span class="avatar avatar-sm"
                                                                style="background-image: url({{ asset('storage/' . $activity['user']['gambar_profile']) }})"></span>
                                                        @else
                                                            <span
                                                                class="avatar avatar-sm">{{ $activity['user']['avatar'] }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="td-truncate">
                                                        <div class="text-truncate">
                                                            {{ $activity['description'] }}
                                                        </div>
                                                        <div class="text-muted small">{{ $activity['action'] }}</div>
                                                    </td>
                                                    <td class="text-nowrap text-muted">{{ $activity['created_at'] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer footer-transparent d-print-none">
                        <div class="container-xl">
                            <div class="row text-center align-items-center flex-row-reverse">
                                <div class="col-lg-auto ms-lg-auto">
                                    <ul class="list-inline list-inline-dots mb-0">

                                        <li class="list-inline-item">
                                            <a href="#" target="_blank" class="link-secondary" rel="noopener">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon text-pink icon-filled icon-inline" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                </svg>
                                                Made with love
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                                    <ul class="list-inline list-inline-dots mb-0">
                                        <li class="list-inline-item">
                                            Copyright &copy; 2024
                                            <a href="." class="link-secondary">PPL Enjoyers</a>.
                                            All rights reserved.
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="./changelog.html" class="link-secondary" rel="noopener">
                                                v1.0.0-beta15
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New report</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="example-text-input"
                                    placeholder="Your report name">
                            </div>
                            <label class="form-label">Report type</label>
                            <div class="form-selectgroup-boxes row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="report-type" value="1"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Simple</span>
                                                <span class="d-block text-muted">Provide only basic data needed for the
                                                    report</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="report-type" value="1"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                                <span class="d-block text-muted">Insert charts and additional advanced
                                                    analyses to be inserted in the report</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label">Report url</label>
                                        <div class="input-group input-group-flat">
                                            <span class="input-group-text">
                                                https://tabler.io/reports/
                                            </span>
                                            <input type="text" class="form-control ps-0" value="report-01"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Visibility</label>
                                        <select class="form-select">
                                            <option value="1" selected>Private</option>
                                            <option value="2">Public</option>
                                            <option value="3">Hidden</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Reporting period</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label class="form-label">Additional information</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Cancel
                            </a>
                            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Create new report
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    window.ApexCharts && new ApexCharts(document.getElementById("chart-peminjaman"), {
                        chart: {
                            type: "bar",
                            fontFamily: "inherit",
                            height: 240,
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            },
                            animations: {
                                enabled: true
                            }
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: "50%",
                                borderRadius: 2
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            opacity: 1
                        },
                        series: [{
                            name: 'Peminjaman',
                            data: @json($chartData)
                        }],
                        tooltip: {
                            theme: "dark",
                            x: {
                                format: 'dd MMM yyyy'
                            }
                        },
                        grid: {
                            padding: {
                                top: -20,
                                right: 0,
                                left: -4,
                                bottom: -4
                            },
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            type: 'datetime',
                            labels: {
                                format: 'dd MMM',
                                rotate: 0,
                                style: {
                                    fontSize: '12px'
                                }
                            },
                            axisBorder: {
                                show: false
                            },
                            tickAmount: 7,
                            tickPlacement: 'on'
                        },
                        yaxis: {
                            labels: {
                                padding: 4
                            },
                            min: 0,
                            tickAmount: 5,
                            forceNiceScale: true
                        },
                        colors: [tabler.getColor("primary")],
                        legend: {
                            show: false
                        }
                    }).render();
                });
            </script>

</x-app>
