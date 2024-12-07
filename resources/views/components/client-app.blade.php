<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/a45f001349.js" crossorigin="anonymous"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('client/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/app.css') }}">


    <script src="{{ asset('client/js/api.js') }}"></script>
    <script src="{{ asset('client/js/alpine.js') }}"></script>
       <!-- Global site tag (gtag.js) - Google Analytics -->
       <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-DBD9BJ92PC"></script>
       <script>
           window.dataLayer = window.dataLayer || [];

           function gtag() {
               dataLayer.push(arguments);
           }

           gtag("js", new Date());
           gtag("config", "G-DBD9BJ92PC");
       </script>
    {{-- <script src="{{ asset('client/') }}"></script>
    <script src="{{ asset('client/') }}"></script> --}}

    {{-- <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style> --}}

    {{-- sssss --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/sihub-datatable.js') }}"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    {{-- script --}}


    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-DBD9BJ92PC"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag("js", new Date());
    gtag("config", "G-DBD9BJ92PC");
</script>

<body class="font-mulish antialiased overflow-x-hidden text-sm md:text-base">
    <script src="{{ asset('assets/js/demo-theme.min.js?1667333929') }}"></script>
    {{-- sweet alert mas --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    {{-- end sweet alert mas --}}
    <div id="app">
        {{-- gawe nyeluk component navbar --}}
        {{-- @if (!in_array(Route::currentRouteName(), ['login', 'register', 'not-found']) && Route::has(Route::currentRouteName()))
            <x-navbar />
        @endif --}}
        <main class="py-4">
            {{ $slot }}
        </main>
        <script src="{{ asset('client/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('client/js/jquery.toast.min.js') }}"></script>
        <script src="{{ asset('client/js/app.js') }}"></script>
        <script src="{{ asset('client/js/datepicker.js') }}"></script>
        <script src="{{ asset('client/js/qrcode.js') }}"></script>
        <script src="{{ asset('client/js/barcode.js') }}"></script>
        <script src="{{ asset('client/js/compressor.js') }}"></script>
        <script src="{{ asset('client/js/countdown.js') }}"></script>
        <script src="{{ asset('client/js/lazysizes.min.js') }}"></script>
        <script src="{{ asset('client/js/swiper.js') }}"></script>
        <script src="{{ asset('client/js/social-share.js') }}"></script>
        <script src="{{ asset('client/js/party.js') }}"></script>
        <script src="{{ asset('client/js/heic2any.js') }}"></script>
        <script src="{{ asset('client/js/custom.js') }}"></script>
    </div>
</body>
<script>
    const bookRecommendationSwiper = new Swiper(".book-recommendation-swiper", {
        slidesPerView: "3.4",
        autoHeight: true,
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        loop: true,
        spaceBetween: 15,
        // centeredSlides: true,
        breakpoints: {
            320: {
                slidesPerView: 2.2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3.4
            },
            1024: {
                slidesPerView: 4.4
            }
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const profilePhoto = '';
        if (profilePhoto) {
            displayHeicImage(profilePhoto, "facePhoto");
        }
    });
</script>
<script>
    function mobileAppDownloadInfo() {
        return {
            openMobileAppDownloadLink: false,
            mobileAppDownloadInfo: !getLocalStorageWithExpiration("mobileAppDownloadInfo")?.isUserHasClosedIt,
            closeMobileAppDownloadInfo() {
                setLocalStorageWithExpiration("mobileAppDownloadInfo", { isUserHasClosedIt: true }, 1);
                this.mobileAppDownloadInfo = false;
            }
        };
    }
</script>



</html>