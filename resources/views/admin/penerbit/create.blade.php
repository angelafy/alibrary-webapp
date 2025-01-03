<script src="{{ asset('client/js/kode/penerbit.js') }}"></script>
<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('penerbit.store') }}" method="POST" id="penerbitForm">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Tambah {{ $main }}</h4>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" class="form-control" name="kode_penerbit" id="kode_penerbit"
                                            name="kode" value="{{ old('kode_penerbit') }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Penulis</label>
                                        <input type="text" class="form-control" name="nama_penerbit"
                                            value="{{ old('nama_penerbit') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label">Alamat
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="3" maxlength="100">{{ old('alamat') }}</textarea>
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
        const textarea = document.getElementById('alamat');
        const ketikan_sakkarepmu = document.getElementById('ketikan_sakkarepmu');

        textarea.addEventListener('input', function() {
            const currentLength = textarea.value.length;
            const maxLength = textarea.getAttribute('maxlength');
            ketikan_sakkarepmu.textContent = `${currentLength}/${maxLength}`;
        });

        // Hapus readonly dan disabled sebelum submit
        document.getElementById('penerbitForm').addEventListener('submit', function() {
            document.getElementById('kode_penerbit').removeAttribute('readonly');
            document.getElementById('kode_penerbit').removeAttribute('disabled');
        });
    </script>
</x-app>
