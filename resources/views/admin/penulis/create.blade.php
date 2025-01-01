<script src="{{ asset('client/js/kode/penulis.js') }}"></script>
<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('penulis.store') }}" method="POST" id="penulisForm">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Tambah {{ $main }}</h4>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" class="form-control" name="kode_author" id="kode_author"
                                            name="kode" value="{{ old('kode_author') }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Penulis</label>
                                        <input type="text" class="form-control" name="nama_author"
                                            value="{{ old('nama_author') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label">Bio
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="bio" id="bio" rows="3" maxlength="100">{{ old('bio') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('penulis.index') }}" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Gawe Count Text
        const textarea = document.getElementById('bio');
        const ketikan_sakkarepmu = document.getElementById('ketikan_sakkarepmu');

        textarea.addEventListener('input', function() {
            const currentLength = textarea.value.length;
            const maxLength = textarea.getAttribute('maxlength');
            ketikan_sakkarepmu.textContent = `${currentLength}/${maxLength}`;
        });

        // Hapus readonly dan disabled sebelum submit
        document.getElementById('penulisForm').addEventListener('submit', function() {
            document.getElementById('kode').removeAttribute('readonly');
            document.getElementById('kode').removeAttribute('disabled');
        });
    </script>
</x-app>
