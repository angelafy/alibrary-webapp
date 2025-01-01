{{-- <script src="{{ asset('client/js/kode/buku.js') }}"></script> --}}
<script src="{{ asset('client/js/tom-select/buku.js') }}"></script>
<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('bukus.update', $buku->id) }}" method="POST" id="bukuForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4 class="card-title">Edit Buku</h4>
                        </div>
                        <div class="card-body">
                            {{-- kode buku --}}
                            <!-- kode buku -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Buku</label>
                                        <input type="text" class="form-control" name="kode_buku"
                                            value="{{ $buku->kode_buku }}" required>
                                        @error('kode_buku')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">ISBN</label>
                                        <input type="text" class="form-control" name="isbn" id="isbn"
                                            maxlength="12" value="{{ $buku->isbn }}" required>
                                        @error('isbn')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Judul Buku -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $buku->title }}" required>
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Genre -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="genre" class="form-label">Genre</label>
                                        <select type="text" class="form-select" id="select-labels-genre"
                                            name="genre_id">
                                            @foreach ($genre as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $buku->genre_id == $item->id ? 'selected' : '' }}
                                                    data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_genre }}&lt;/span&gt;'>
                                                    {{ $item->nama_genre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('genre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Penulis -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="penulis" class="form-label">Penulis</label>
                                        <select type="text" class="form-select" id="select-labels-penulis"
                                            name="penulis_id">
                                            @foreach ($penulis as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $buku->penulis_id == $item->id ? 'selected' : '' }}
                                                    data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_author }}&lt;/span&gt;'>
                                                    {{ $item->nama_author }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penulis')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Penerbit -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="penerbit" class="form-label">Penerbit</label>
                                        <select type="text" class="form-select" id="select-labels-penerbit"
                                            name="penerbit_id">
                                            @foreach ($penerbit as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $buku->penerbit_id == $item->id ? 'selected' : '' }}
                                                    data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_penerbit }}&lt;/span&gt;'>
                                                    {{ $item->nama_penerbit }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penerbit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tahun Terbit -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="terbit" class="form-label">Tahun Terbit</label>
                                        <input type="date" class="form-control" id="terbit" name="terbit"
                                            value="{{ $buku->terbit }}" required>
                                        @error('terbit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Stok -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stok</label>
                                        <input type="number" class="form-control" id="stock" name="stock"
                                            value="{{ $buku->stock }}" required>
                                        @error('stock')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="gambar_buku" class="form-label">Gambar Buku</label>
                                            @if ($buku->gambar_buku)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/buku/' . $buku->gambar_buku) }}"
                                                        alt="Current Image" class="img-thumbnail"
                                                        style="max-height: 200px">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control" id="gambar_buku"
                                                name="gambar_buku">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" maxlength="100">{{ $buku->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sinopsis
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3" maxlength="100">{{ $buku->sinopsis }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('bukus.index') }}" class="btn btn-link">Batal</a>
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
        const deskripsiTextarea = document.getElementById('deskripsi');
        const sinopsisTextarea = document.getElementById('sinopsis');
        const ketikan_sakkarepmu = document.getElementsByClassName('form-label-description');

        deskripsiTextarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            const maxLength = this.getAttribute('maxlength');
            ketikan_sakkarepmu[0].textContent = `${currentLength}/${maxLength}`;
        });

        sinopsisTextarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            const maxLength = this.getAttribute('maxlength');
            ketikan_sakkarepmu[1].textContent = `${currentLength}/${maxLength}`;
        });

        // Initialize character counts
        window.onload = function() {
            ketikan_sakkarepmu[0].textContent = `${deskripsiTextarea.value.length}/100`;
            ketikan_sakkarepmu[1].textContent = `${sinopsisTextarea.value.length}/100`;
        };
    </script>
</x-app>
