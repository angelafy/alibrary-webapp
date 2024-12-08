<x-client-app>

    <body class=" border-top-wide border-primary d-flex flex-column">
        <script src="{{ asset('assets/js/demo.min.js?1667333929') }}"></script>
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.png') }}"
                            height="20" alt=""></a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">Pendaftaran Akun</h2>
                        {{-- <div class="grid grid-cols-1 lg:grid-cols-1 gap-x-4 lg:gap-x-2 items-center">
        <form class="needs-validation space-y-2 px-2 lg:px-4 pt-4 pb-4 container-ratio" action="https://HLJI1cppo2Zy.id/register"
            method="POST">
            <input type="hidden" name="_token" value="P8mvKSVioVpUefZiMuAl9FSfoREhARBjIPFtxABG">
            <h3 class="text-lg lg:text-2xl font-medium">Pendaftaran Akun</h3> --}}
                        <div class="space-y-2 lg:space-y-4">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">
                                <!-- NISN -->
                                <div class="space-y-2">
                                    <label for="nisn" class="text-sm font-medium text-gray-900">Nomor Induk Siswa
                                        Nasional (NISN)</label>
                                    <input type="text" id="nisn" name="nisn"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="space-y-2">
                                    <label for="nama" class="text-sm font-medium text-gray-900">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                </div>

                                <!-- Kelas -->
                                <div class="space-y-2">
                                    <label for="kelas" class="text-sm font-medium text-gray-900">Kelas</label>
                                    <select id="kelas" name="kelas"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">
                                <!-- Tanggal Lahir -->
                                <div class="space-y-2">
                                    <label for="tanggal_lahir" class="text-sm font-medium text-gray-900">Tanggal
                                        Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="space-y-2">
                                    <label for="jenis_kelamin" class="text-sm font-medium text-gray-900">Jenis
                                        Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <!-- Agama -->
                                <div class="space-y-2">
                                    <label for="agama" class="text-sm font-medium text-gray-900">Agama</label>
                                    <select id="agama" name="agama"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                        <option value="" disabled selected>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Katholik">Katholik</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 lg:space-y-4">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">
                                <!-- Alamat -->
                                <div class="space-y-2 col-span-3">
                                    <label for="alamat" class="text-sm font-medium text-gray-900">Alamat</label>
                                    <textarea id="alamat" name="alamat" rows="3"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required></textarea>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="space-y-2">
                                    <label for="telepon" class="text-sm font-medium text-gray-900">Nomor
                                        Telepon</label>
                                    <input type="tel" id="telepon" name="telepon"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <label for="email" class="text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="input-form w-full text-sm lg:text-base border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <input class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                    id="disclaimer" name="disclaimer" required="" type="checkbox">
                                <label for="disclaimer" class="block text-xs lg:text-sm text-gray-900">
                                    Saya menyatakan telah membaca dan menyetujui terkait
                                    <a href="https://HLJI1cppo2Zy.id/supports/privacy-policy"
                                        class="font-bold underline text-primary-500">Kebijakan Privasi</a>
                                </label>
                            </div>
                        </div>

                        <div x-cloak="" x-data="{ otpSentViaModal: false }">
                            <button @click="otpSentViaModal = true"
                                class="w-full flex justify-center p-4 border border-transparent text-base lg:text-lg font-medium rounded-md text-gray-500 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                                id="nextButton" type="submit">Submit</button>
                        </div>
                        </form>
                    </div>
</x-client-app>
