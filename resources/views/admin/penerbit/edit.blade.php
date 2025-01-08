<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4 class="card-title">Edit Penerbit</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Kode Penerbit</label>
                                        <input type="text" 
                                               class="form-control @error('kode_penerbit') is-invalid @enderror" 
                                               name="kode_penerbit" 
                                               value="{{ old('kode_penerbit', $penerbit->kode_penerbit) }}" 
                                               required />
                                        @error('kode_penerbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Penerbit</label>
                                        <input type="text" 
                                               class="form-control @error('nama_penerbit') is-invalid @enderror" 
                                               name="nama_penerbit"
                                               value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" 
                                               required />
                                        @error('nama_penerbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label required">Alamat
                                            <span class="form-label-description" id="alamat_counter">0/100</span>
                                        </label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                                  name="alamat" 
                                                  rows="3" 
                                                  maxlength="100" 
                                                  required>{{ old('alamat', $penerbit->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               name="email"
                                               value="{{ old('email', $penerbit->email) }}" 
                                               required />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('penerbit.index') }}" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter for alamat field
        const textarea = document.querySelector('textarea[name="alamat"]');
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