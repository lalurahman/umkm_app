<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >

    <!-- AUTHOR META -->
    <meta
        name="author"
        content="UMKM Mamuju"
    >
    <meta
        name="title"
        content="UMKM Mamuju"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    />
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- WEBPAGE TITLE -->
    <title>UMKM MAMUJU</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FAVICON -->
    <link
        rel="icon"
        href="{{ asset('admin/img/logo.jpg') }}"
    >

    <!-- FONTS -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/fonts/flaticon/flaticon.css') }}"
    >
    <link
        rel="stylesheet"
        href="{{ asset('assets/fonts/icofont/icofont.min.css') }}"
    >
    <link
        rel="stylesheet"
        href="{{ asset('assets/fonts/fontawesome/fontawesome.min.css') }}"
    >

    <!-- VENDOR -->
    @include('layouts.partials.public.styles')
    @stack('styles')
    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    <div
        class="backdrop"
        wire:ignore
    ></div>
    <a
        class="backtop fas fa-arrow-up"
        href="#"
    ></a>

    <!--=====================================
                    HEADER PART START
        =======================================-->
    @include('layouts.partials.public.header')
    <!--=====================================
                    HEADER PART END
        =======================================-->
    @include('layouts.partials.public.navbar')
    <!--=====================================
                CATEGORY SIDEBAR PART START
        =======================================-->
    @include('layouts.partials.public.side_category')
    <!--=====================================
                CATEGORY SIDEBAR PART END
        =======================================-->


    <!--=====================================
                  CART SIDEBAR PART START
        =======================================-->

    {{-- @include('layouts.partials.public.side_cart') --}}
    <!--=====================================
                    CART SIDEBAR PART END
        =======================================-->

    <!--=====================================
                  NAV SIDEBAR PART START
        =======================================-->
    @include('layouts.partials.public.side_nav')
    <!--=====================================
                  NAV SIDEBAR PART END
        =======================================-->


    <!--=====================================
                    MOBILE-MENU PART START
        =======================================-->
    @include('layouts.partials.public.mobile_menu')
    <!--=====================================
                    MOBILE-MENU PART END
        =======================================-->


    @yield('content')


    @include('layouts.partials.public.footer')

    @include('layouts.partials.public.scripts')
    @stack('scripts')

</body>

</html>
