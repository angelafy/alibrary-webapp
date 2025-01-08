<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Penulis</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Kode Penulis</div>
                            <div class="input-icon">
                                <input type="text" value="{{ $penulis->kode_author }}" class="form-control"
                                    placeholder="Search…" readonly />
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
                            <div class="datagrid-title">Nama Penulis</div>
                            <div class="datagrid-content">{{ $penulis->nama_author }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Tanggal Dibuat</div>
                            <div class="datagrid-content">
                                {{ Carbon\Carbon::parse($penulis->created_at)->format('d/m/Y') }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Terakhir Diupdate</div>
                            <div class="datagrid-content">
                                {{ Carbon\Carbon::parse($penulis->updated_at)->format('d/m/Y') }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content">
                                <span class="status status-green">
                                    Aktif
                                </span>
                            </div>
                        </div>
                        <div class="datagrid-item col-span-2">
                            <div class="datagrid-title">Biografi</div>
                            <div class="datagrid-content">
                                {{ $penulis->bio }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('penulis.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
