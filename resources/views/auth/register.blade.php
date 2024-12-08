<x-client-app>

    <body class="font-mulish antialiased overflow-x-hidden text-sm md:text-base">
        <div class="flex min-h-screen bg-white lg:bg-gray-50 py-0 lg:py-16 px-0 lg:px-56">
            <div class="my-0 lg:my-auto w-full rounded-lg bg-white shadow-none lg:shadow-sm">
                <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50"></div>

                <div class="px-4 lg:px-8 mt-4 lg:mt-8">
                    <div class="group" x-data="{ languageDropdown: false }" x-cloak="">
                        <button @click="languageDropdown = !languageDropdown"
                            class="flex flex-wrap items-center gap-1 rounded">
                            <div class="flex items-center gap-2">
                                <img src="images/Flag_of_Indonesia.svg"
                                    class="border border-gray-200 rounded mr-1 w-10 h-6 object-center object-cover"
                                    alt="" />
                                <span class="block text-xs lg:text-sm">Bahasa Indonesia</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-primary-500 ml-1 h-3 w-3"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div class="relative" x-show="languageDropdown" @click.outside="languageDropdown = false">
                            <div class="rounded-lg shadow-lg">
                                <div class="origin-top-right absolute z-200 left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="https://perpustakaan.jakarta.go.id/language/id"
                                        class="flex items-center gap-2 px-4 py-2 text-xs lg:text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">
                                        <img src="images/Flag_of_Indonesia.svg" class="h-4 w-6 rounded border"
                                            alt="" />
                                        <span>Bahasa Indonesia</span>
                                    </a>
                                    <a href="https://perpustakaan.jakarta.go.id/language/en"
                                        class="flex items-center gap-2 px-4 py-2 text-xs lg:text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="user-menu-item-1">
                                        <img src="images/Flag_of_the_United_Kingdom.svg" class="h-4 w-6 rounded border"
                                            alt="" />
                                        <span>Inggris</span>
                                        <div class="rounded px-2 py-0.5 text-xs lg:text-sm bg-green-100 text-green-500">
                                            v0.25
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-1 gap-x-4 lg:gap-x-8 items-center">
                    <form class="needs-validation space-y-6 px-4 lg:px-8 pt-4 pb-8"
                        action="https://perpustakaan.jakarta.go.id/register" method="POST">
                        <input type="hidden" name="_token" value="QDcgya7nxmKCbpvoaNosNmaBOzG7wLIUEmyDYCAV" />
                        <h3 class="text-lg lg:text-2xl font-medium">
                            Pendaftaran Kawan Perpus
                        </h3>

                        <div class="space-y-2 lg:space-y-4">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">
                                <div>
                                    <label for="nik" class="font-normal text-xs lg:text-sm">
                                        NIK <span class="text-sm text-red-600 font-medium">*</span>
                                    </label>
                                    <input id="nik" type="text" class="identity-number-format w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-xs lg:text-sm @error('nik') is-invalid @enderror"
                                    name="nik" value="{{ old('nik') }}" required autofocus>
                                   
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="nama" class="font-normal text-xs lg:text-sm">
                                        Nama Lengkap <span class="text-sm text-red-600 font-medium">*</span>
                                    </label>
                                    <input id="nama" type="text" class="latin-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-xs lg:text-sm @error('nama') is-invalid @enderror"
                                           name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="jenis_kelamin" class="font-normal text-xs lg:text-sm">
                                        Jenis Kelamin <span class="text-sm text-red-600 font-medium">*</span>
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-xs lg:text-sm" required>
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="lakilaki" {{ old('jenis_kelamin') == 'lakilaki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="no_telepon" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>Email</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative">
                                        <input id="email" type="email" class="number-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                        
                                    </div>
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="email" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>Email</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative">
                                        <input name="email" id="email" type="email"
                                            class="w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />
                                    </div>
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="username" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>Username</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative">
                                        <input name="username" id="username" type="text"
                                            class="latin-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />
                                    </div>
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="password" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>Kata Sandi</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative" x-data="{ isPasswordVisible: false }">
                                        <input name="password" id="password"
                                            :type="isPasswordVisible ? 'text' : 'password'"
                                            class="w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />

                                        <div @click="isPasswordVisible = !isPasswordVisible"
                                            class="absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-500 cursor-pointer">
                                            <svg x-show="!isPasswordVisible" class="w-4 h-4" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88">
                                                </path>
                                            </svg>
                                            <svg x-show="isPasswordVisible" class="w-4 h-4" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <span class="mt-1 block text-gray-400 text-xs">*Minimal 6 karakter dan memerlukan
                                        setidaknya satu huruf,
                                        angka, serta simbol</span>
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="password_confirmation" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>Konfirmasi Kata Sandi</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative" x-data="{ isPasswordVisible: false }">
                                        <input name="password_confirmation" id="password_confirmation"
                                            :type="isPasswordVisible ? 'text' : 'password'"
                                            class="w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />

                                        <div @click="isPasswordVisible = !isPasswordVisible"
                                            class="absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-500 cursor-pointer">
                                            <svg x-show="!isPasswordVisible" class="w-4 h-4" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88">
                                                </path>
                                            </svg>
                                            <svg x-show="isPasswordVisible" class="w-4 h-4" fill="none"
                                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <input class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                    id="disclaimer" name="disclaimer" required="" type="checkbox" />
                                <label for="disclaimer" class="block text-xs lg:text-sm text-gray-900">
                                    Saya menyatakan telah membaca dan menyetujui terkait
                                    <a href="https://perpustakaan.jakarta.go.id/supports/privacy-policy"
                                        class="font-bold underline text-primary-500">Kebijakan Privasi</a>
                                </label>
                            </div>
                        </div>

                        <div x-cloak="" x-data="{ otpSentViaModal: false }">
                            <button @click="otpSentViaModal = true"
                                class="w-full flex justify-center p-4 border border-transparent text-base lg:text-lg font-medium rounded-md text-gray-500 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                                disabled="" id="nextButton" type="button">
                                Selanjutnya
                            </button>

                 
                        </div>

                        <div class="text-center">
                            <div class="text-sm">
                                Sudah memiliki akun?
                                <a href="https://perpustakaan.jakarta.go.id/login"
                                    class="font-bold text-primary-600 hover:text-primary-500">Masuk</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const nextButton = $("#nextButton");
            const countryContainer = $("#countryContainer");
            const indonesianNationalityTypeRadio = $("#nationality_type");
            const foreignerNationalityTypeRadio = $("#nationality_type2");

            $(document).ready(function() {
                if (
                    foreignerNationalityTypeRadio.is(":checked") &&
                    foreignerNationalityTypeRadio.val() === "WNA"
                ) {
                    countryContainer.removeClass("hidden");
                }
            });

            $("#disclaimer").change(function() {
                if ($(this).prop("checked") === true) {
                    nextButton.removeAttr("disabled");
                    nextButton.addClass("bg-primary-600 hover:bg-primary-700 text-white");
                    nextButton.removeClass("bg-gray-100 text-gray-500");
                } else if ($(this).prop("checked") === false) {
                    nextButton.attr("disabled", true);
                    nextButton.removeClass(
                        "bg-primary-600 hover:bg-primary-700 text-white"
                    );
                    nextButton.addClass("bg-gray-100 text-gray-500");
                }
            });

            indonesianNationalityTypeRadio.change(function() {
                if ($(this).prop("checked") === true) {
                    countryContainer.addClass("hidden");
                }
            });

            foreignerNationalityTypeRadio.change(function() {
                if ($(this).prop("checked") === true) {
                    countryContainer.removeClass("hidden");
                }
            });
        </script>
    </body>
    <script>
        const nextButton = $("#nextButton");
        const countryContainer = $("#countryContainer");
        const indonesianNationalityTypeRadio = $("#nationality_type");
        const foreignerNationalityTypeRadio = $("#nationality_type2");

        $(document).ready(function() {
            if (
                foreignerNationalityTypeRadio.is(":checked") &&
                foreignerNationalityTypeRadio.val() === "WNA"
            ) {
                countryContainer.removeClass("hidden");
            }
        });

        $("#disclaimer").change(function() {
            if ($(this).prop("checked") === true) {
                nextButton.removeAttr("disabled");
                nextButton.addClass("bg-primary-600 hover:bg-primary-700 text-white");
                nextButton.removeClass("bg-gray-100 text-gray-500");
            } else if ($(this).prop("checked") === false) {
                nextButton.attr("disabled", true);
                nextButton.removeClass(
                    "bg-primary-600 hover:bg-primary-700 text-white"
                );
                nextButton.addClass("bg-gray-100 text-gray-500");
            }
        });

        indonesianNationalityTypeRadio.change(function() {
            if ($(this).prop("checked") === true) {
                countryContainer.addClass("hidden");
            }
        });

        foreignerNationalityTypeRadio.change(function() {
            if ($(this).prop("checked") === true) {
                countryContainer.removeClass("hidden");
            }
        });
    </script>

</x-client-app>
