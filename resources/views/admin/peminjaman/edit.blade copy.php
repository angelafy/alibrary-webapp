<script src="{{ asset('client/js/tom-select/peminjaman.js') }}"></script>
<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST"
                        id="peminjamanForm">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4 class="card-title">Edit Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Peminjaman</label>
                                        <input type="text" class="form-control" name="kode_peminjaman"
                                            value="{{ $peminjaman->kode_peminjaman }}" required>
                                        @error('kode_peminjaman')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Peminjam</label>
                                        <select type="text" class="form-select" id="select-labels-user" name="user_id">
                                            @foreach ($users as $user)
                                         

                                                <option value="{{ $user->id }}"
                                                    {{ $user->user_id == $user->id ? 'selected' : '' }}
                                                    data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $user->id }}&lt;/span&gt;'>
                                                    {{ $user->nama }}
                                                </option>
                                            @endforeach
                                        </select>


                                   
                                        @error('user_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pinjam</label>
                                        <input type="date" class="form-control" name="tgl_pinjam"
                                            value="{{ old('tgl_pinjam', $peminjaman->tgl_pinjam ? date('Y-m-d', strtotime($peminjaman->tgl_pinjam)) : '') }}"
                                            required>
                                        @error('tgl_pinjam')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kembali</label>
                                        <input type="date" class="form-control" name="tgl_kembali"
                                            value="{{ old('tgl_kembali', $peminjaman->tgl_kembali ? date('Y-m-d', strtotime($peminjaman->tgl_kembali)) : '') }}"
                                            required>
                                        @error('tgl_kembali')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="0" {{ $peminjaman->status == 0 ? 'selected' : '' }}>
                                                Menunggu</option>
                                            <option value="1" {{ $peminjaman->status == 1 ? 'selected' : '' }}>
                                                Disetujui</option>
                                            <option value="2" {{ $peminjaman->status == 2 ? 'selected' : '' }}>
                                                Dipinjam</option>
                                            <option value="3" {{ $peminjaman->status == 3 ? 'selected' : '' }}>
                                                Dikembalikan</option>
                                            <option value="4" {{ $peminjaman->status == 4 ? 'selected' : '' }}>
                                                Terlambat</option>
                                            <option value="5" {{ $peminjaman->status == 5 ? 'selected' : '' }}>
                                                Hilang</option>
                                            <option value="6" {{ $peminjaman->status == 6 ? 'selected' : '' }}>
                                                Pengembalian</option>
                                            <option value="7" {{ $peminjaman->status == 7 ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="3">{{ $peminjaman->keterangan }}</textarea>
                                        @error('keterangan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#select-users', {
                placeholder: 'Pilih peminjam...',
                allowEmptyOption: true
            });
        });
    </script>
</x-app>
