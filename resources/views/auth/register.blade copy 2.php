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
                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="no_identitas" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>NIK</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative">
                                        <input name="no_identitas" id="no_identitas" type="text"
                                            class="identity-number-format w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="name" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>Nama Lengkap</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative">
                                        <input name="name" id="name" type="text"
                                            class="latin-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="flex items-center gap-1">
                                        <label for="" class="font-normal text-xs lg:text-sm">
                                            Kewarganegaraan
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>
                                    <div class="ml-0 lg:ml-2 mt-3 lg:mt-4 flex items-center space-x-4">
                                        <div class="flex items-center">
                                            <input name="nationality_type" type="radio" id="nationality_type"
                                                value="WNI" checked=""
                                                class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300" />
                                            <label class="ml-3 block text-sm lg:text-base text-gray-700"
                                                for="nationality_type">
                                                <div class="flex flex-wrap items-center gap-x-1">
                                                    <span>WNI</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="flex items-center">
                                            <input name="nationality_type" type="radio" id="nationality_type2"
                                                value="WNA"
                                                class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300" />
                                            <label class="ml-3 block text-sm lg:text-base text-gray-700"
                                                for="nationality_type2">
                                                <div class="flex flex-wrap items-center gap-x-1">
                                                    <span>WNA</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="hidden" id="countryContainer">
                                    <div class="flex items-center gap-1">
                                        <label for="country" class="font-normal text-xs lg:text-sm">
                                            Negara
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <select
                                        class="px-3 py-2.5 lg:py-3 mt-1 block w-full border border-gray-300 bg-gray-50 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-xs lg:text-sm"
                                        id="country" name="country_id" required="">
                                        <option value="1">Afghanistan</option>
                                    </select>
                                </div>

                                <div class="">
                                    <div class="flex items-center gap-1">
                                        <label for="no_telepon" class="font-normal text-xs lg:text-sm">
                                            <div class="flex flex-wrap items-center gap-x-1">
                                                <span>No. WhatsApp</span>
                                            </div>
                                        </label>
                                        <span class="text-sm text-red-600 font-medium">*</span>
                                    </div>

                                    <div class="relative">
                                        <input name="no_telepon" id="no_telepon" type="text"
                                            class="number-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                            value="" required="" />
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

                            <div class="fixed z-50 inset-0" aria-labelledby="modal-title" role="dialog"
                                aria-modal="true" x-show="otpSentViaModal">
                                <div
                                    class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                        aria-hidden="true"></div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                        aria-hidden="true">​</span>
                                    <div @click.outside="otpSentViaModal = false" style="max-height: 36rem !important"
                                        class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-full sm:max-w-lg">
                                        <div class="bg-gray-50 text-center px-4 py-3 sm:px-6">
                                            <span class="text-sm lg:text-lg font-medium">
                                                <div class="flex flex-wrap items-center gap-x-1">
                                                    <span>Pilih Metode Pengiriman OTP</span>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="p-4 pb-2">
                                            <div class="p-6 border-l-4 border-yellow-100 rounded-r-xl bg-yellow-50">
                                                <div class="flex">
                                                    <div class="ml-3">
                                                        <h3 class="text-sm font-medium text-yellow-800">
                                                            Informasi
                                                        </h3>
                                                        <div class="mt-2 text-sm text-yellow-700">
                                                            <ul role="list" class="pl-5 space-y-1 list-disc">
                                                                <li>
                                                                    Pilihan pengiriman OTP ini akan menjadi media
                                                                    notifikasi utama kami kepada kamu
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-4 pt-2">
                                            <div class="flex flex-wrap lg:flex-nowrap items-center gap-1 lg:gap-2">
                                                <label for="whatsappOtp"
                                                    class="flex items-center gap-2 w-full p-3 rounded border">
                                                    <input id="whatsappOtp" name="otp_sent_via" type="radio"
                                                        value="WhatsApp"
                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300"
                                                        required="" />
                                                    <span class="text-xs lg:text-sm">Whatsapp</span>
                                                </label>

                                                <label for="emailOtp"
                                                    class="flex items-center gap-2 w-full p-3 rounded border">
                                                    <input id="emailOtp" name="otp_sent_via" type="radio"
                                                        value="Email"
                                                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300"
                                                        required="" />
                                                    <span class="text-xs lg:text-sm">Email</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div
                                            class="flex items-center flex-row-reverse bg-gray-50 px-4 py-3 sm:px-6 gap-2">
                                            <button type="submit"
                                                class="text-sm lg:text-base w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:w-auto">
                                                <div class="flex flex-wrap items-center gap-x-1">
                                                    <span>Kirim OTP</span>
                                                </div>
                                            </button>
                                            <button @click="otpSentViaModal = false" type="button"
                                                class="w-full inline-flex justify-center rounded-md border p-2 border p-2-gray-300 shadow-sm px-4 py-2 bg-white text-sm lg:text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:w-auto sm:text-sm">
                                                <div class="flex flex-wrap items-center gap-x-1">
                                                    <span>Kembali</span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/jquery.toast.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/datepicker.js"></script>
        <script src="js/qrcode.js"></script>
        <script src="js/barcode.js"></script>
        <script src="js/compressor.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/lazysizes.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/social-share.js"></script>
        <script src="js/party.js"></script>
        <script src="js/heic2any.js"></script>
        <script src="js/custom.js"></script>

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
</x-client-app>
