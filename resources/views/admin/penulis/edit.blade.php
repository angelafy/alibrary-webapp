<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('penulis.update', $penulis->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4 class="card-title">Edit Penulis</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Kode Penulis</label>
                                        <input type="text"
                                            class="form-control @error('kode_author') is-invalid @enderror"
                                            name="kode_author" value="{{ old('kode_author', $penulis->kode_author) }}"
                                            required />
                                        @error('kode_author')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Penulis</label>
                                        <input type="text"
                                            class="form-control @error('nama_author') is-invalid @enderror"
                                            name="nama_author" value="{{ old('nama_author', $penulis->nama_author) }}"
                                            required />
                                        @error('nama_author')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label required">Alamat
                                            <span class="form-label-description" id="alamat_counter">0/100</span>
                                        </label>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="3" maxlength="100"
                                            required>{{ old('bio', $penulis->bio) }}</textarea>
                                        @error('bio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('penulis.index') }}" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter for bio field
        const textarea = document.querySelector('textarea[name="bio"]');
        const counter = document.getElementById('alamat_counter');

        // Set initial count
        const updateCounter = () => {
            const currentLength = textarea.value.length;
            const maxLength = textarea.getAttribute('maxlength');
            counter.textContent = `${currentLength}/${maxLength}`;
        };

        // Initial count
        updateCounter();

        // Update count on input
        textarea.addEventListener('input', updateCounter);
    </script>
</x-app>
