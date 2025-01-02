<x-app>
  <div class="page-body">
      <div class="container-xl">
          <div class="card">
              <div class="accordion" id="accordion-example">
                  <div class="accordion-item">
                      <h2 class="accordion-header" id="heading-2">
                          <button class="card accordion-button collapsed" type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapse-2" aria-expanded="false">
                              Gambar
                          </button>
                      </h2>
                      <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                          <div class="col-md-6 col-lg-12">
                              <div class="row row-cards">
                                  <div class="col-12">
                                      <div class="card-body p-4 py-5 text-center">
                                          <span class="avatar avatar-xl mb-4 rounded"
                                              style="
                                                  background-image: url('{{ $buku->gambar_buku ? asset('storage/buku/' . $buku->gambar_buku) : asset('storage/buku/default.jpg') }}');
                                                  background-size: cover;
                                                  background-position: center;
                                                  width: 100%;
                                                  max-width: 500px;
                                                  height: auto;
                                                  aspect-ratio: 1/1;
                                                  border-radius: 50%;
                                              ">
                                          </span>
                                          <h3 class="mb-0">{{ $buku->title }}</h3>
                                          <p class="text-muted">{{ $buku->created_at }}</p>
                                          <p class="mb-3">
                                              <button id="downloadLink" class="btn btn-outline-primary-lt">Download Gambar</button>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
        <div class="accordion" id="bookDetailAccordion">
            <!-- Informasi Utama -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingMain">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMain" aria-expanded="false" aria-controls="collapseMain">
                        <h3 class="m-0">Informasi Utama</h3>
                    </button>
                </h2>
                <div id="collapseMain" class="accordion-collapse collapse" aria-labelledby="headingMain" data-bs-parent="#bookDetailAccordion">
                    <div class="accordion-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Kode Buku</div>
                                <div class="datagrid-content">{{ $buku->kode_buku }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">ISBN</div>
                                <div class="datagrid-content">{{ $buku->isbn }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Judul</div>
                                <div class="datagrid-content">{{ $buku->title }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Stock</div>
                                <div class="datagrid-content">{{ $buku->stock }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Penerbitan -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPublish">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePublish" aria-expanded="false" aria-controls="collapsePublish">
                        <h3 class="m-0">Informasi Penerbitan</h3>
                    </button>
                </h2>
                <div id="collapsePublish" class="accordion-collapse collapse" aria-labelledby="headingPublish" data-bs-parent="#bookDetailAccordion">
                    <div class="accordion-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Penulis</div>
                                <div class="datagrid-content">{{ $buku->penulis->nama_author }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Penerbit</div>
                                <div class="datagrid-content">{{ $buku->penerbit->nama_penerbit }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Genre</div>
                                <div class="datagrid-content">{{ $buku->genre->nama_genre }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Tanggal Terbit</div>
                                <div class="datagrid-content">{{ $buku->terbit }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Buku -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingContent">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContent" aria-expanded="false" aria-controls="collapseContent">
                        <h3 class="m-0">Konten Buku</h3>
                    </button>
                </h2>
                <div id="collapseContent" class="accordion-collapse collapse" aria-labelledby="headingContent" data-bs-parent="#bookDetailAccordion">
                    <div class="accordion-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Deskripsi</div>
                                <div class="datagrid-content">{{ $buku->deskripsi }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Sinopsis</div>
                                <div class="datagrid-content">{{ $buku->sinopsis }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Sistem -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSystem">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSystem" aria-expanded="false" aria-controls="collapseSystem">
                        <h3 class="m-0">Informasi Sistem</h3>
                    </button>
                </h2>
                <div id="collapseSystem" class="accordion-collapse collapse" aria-labelledby="headingSystem" data-bs-parent="#bookDetailAccordion">
                    <div class="accordion-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Tgl Data Dibuat</div>
                                <div class="datagrid-content">{{ $buku->created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer text-end mt-3">
                <div class="d-flex">
                    <a href="{{ route('bukus.index') }}" class="btn btn-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
      document.getElementById('downloadLink').addEventListener('click', function (e) {
          e.preventDefault();
          const namafile = '{{ $buku->gambar_buku ? $buku->gambar_buku : "default.jpg" }}';
          const filePath = '{{ asset("storage/buku/") }}/' + namafile;

          const link = document.createElement('a');
          link.href = filePath;
          link.download = namafile;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
      });
  </script>
</x-app>