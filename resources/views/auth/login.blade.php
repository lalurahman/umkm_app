<!doctype html>
<html
    lang="en"
    class=" layout-wide  customizer-hide"
    dir="ltr"
    data-skin="default"
    data-assets-path="assets/"
    data-template="vertical-menu-template"
    data-bs-theme="light"
>

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />


    <title>Masuk Aplikasi Pasar</title>

    <!-- Favicon -->
    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('assets/img/logo.jpg') }}"
    />

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com/"
    />
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com/"
        crossorigin
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet"
    />

    <link
        rel="stylesheet"
        href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}"
    />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->


    <link
        rel="stylesheet"
        href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}"
    />

    <link
        rel="stylesheet"
        href="{{ asset('assets/vendor/css/core.css') }}"
    />
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/demo.css') }}"
    />


    <!-- Vendors CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
    />

    <!-- endbuild -->

    <!-- Vendor -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/vendor/libs/%40form-validation/form-validation.css') }}"
    />

    <!-- Page CSS -->
    <!-- Page -->
    <link
        rel="stylesheet"
        href="{{ asset('assets/vendor/css/pages/page-auth.css') }}"
    />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script> --}}


    <script src="{{ asset('assets/js/config.js') }}"></script>
    <style>
        .logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .logos img {
            width: 100px;
        }
    </style>

    <!-- PWA  -->
    <meta
        name="theme-color"
        content="#2596be"
    />
    <link
        rel="apple-touch-icon"
        href="{{ asset('logo.jpg') }}"
    >
    <link
        rel="manifest"
        href="{{ asset('manifest.json') }}"
    >
</head>

<body style="background-color: #2596be">


    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <div class="logos">
                                <img
                                    src="{{ asset('assets/img/logo.jpg') }}"
                                    alt="Logo Mamuju"
                                >
                            </div>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1">Selamat Datang 👋</h4>
                        <p class="mb-4">
                            Masuk untuk melanjutkan ke aplikasi
                        </p>
                        @if ($errors->any())
                            <div
                                class="alert alert-danger alert-dismissible fade show"
                                role="alert"
                            >
                                Email atau Password Salah
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close"
                                ></button>
                            </div>
                        @endif
                        <form
                            id="formAuthentication"
                            class="mb-6"
                            action="{{ route('login') }}"
                            method="POST"
                        >
                            @csrf
                            <div class="mb-6 form-control-validation">
                                <label
                                    for="email"
                                    class="form-label"
                                >Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Masukkan Email"
                                    value="{{ old('email') }}"
                                    autofocus
                                />
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation">
                                <label
                                    class="form-label"
                                    for="password"
                                >Password</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        aria-describedby="password"
                                    />
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button
                                    class="btn btn-primary d-grid w-100"
                                    type="submit"
                                >Masuk</button>
                            </div>
                        </form>
                        <p class="text-center">
                            <span>Belum punya akun ?</span>
                            <a href="{{ route('register') }}">
                                <span>Daftar</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login -->
            </div>
        </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js  -->


    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/%40algolia/autocomplete-js.js') }}"></script>



    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>



    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>


    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/%40form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/js/main.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>

    <script>
        @if (session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
            });
        @endif
    </script>
    <script src="{{ asset('sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
</body>

</html>
