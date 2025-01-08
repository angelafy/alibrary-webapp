<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('genre.update', $genre->id) }}" method="POST" id="genreForm">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4 class="card-title">Edit Genre</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Genre</label>
                                        <input type="text" class="form-control" name="kode_genre" id="kode_genre"
                                            value="{{ old('kode_genre', $genre->kode_genre) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Genre</label>
                                        <input type="text" class="form-control" name="nama_genre"
                                            value="{{ old('nama_genre', $genre->nama_genre) }}" required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label required">Deskripsi
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" maxlength="100" required>{{ old('deskripsi', $genre->deskripsi) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('genre.index') }}" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Gawe Count Text
        const textarea = document.getElementById('deskripsi');
        const ketikan_sakkarepmu = document.getElementById('ketikan_sakkarepmu');

        // Set initial count
        const currentLength = textarea.value.length;
        const maxLength = textarea.getAttribute('maxlength');
        ketikan_sakkarepmu.textContent = `${currentLength}/${maxLength}`;

        textarea.addEventListener('input', function() {
            const currentLength = textarea.value.length;
            const maxLength = textarea.getAttribute('maxlength');
            ketikan_sakkarepmu.textContent = `${currentLength}/${maxLength}`;
        });

        // Hapus readonly dan disabled sebelum submit
        document.getElementById('genreForm').addEventListener('submit', function() {
            document.getElementById('kode_genre').removeAttribute('readonly');
            document.getElementById('kode_genre').removeAttribute('disabled');
        });
    </script>
</x-app>
