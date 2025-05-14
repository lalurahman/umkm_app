<!doctype html>
<html
    lang="en"
    class=" layout-wide  customizer-hide"
    dir="ltr"
    data-skin="default"
    data-assets-path="admin/"
    data-template="vertical-menu-template"
    data-bs-theme="light"
>

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />


    <title>Daftar di Aplikasi Pasar</title>

    <!-- Favicon -->
    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('admin/img/logo.jpg') }}"
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
        href="{{ asset('admin/vendor/fonts/iconify-icons.css') }}"
    />

    <!-- Core CSS -->
    <!-- build:css admin/vendor/css/theme.css  -->


    <link
        rel="stylesheet"
        href="{{ asset('admin/vendor/libs/pickr/pickr-themes.css') }}"
    />

    <link
        rel="stylesheet"
        href="{{ asset('admin/vendor/css/core.css') }}"
    />
    <link
        rel="stylesheet"
        href="{{ asset('admin/css/demo.css') }}"
    />


    <!-- Vendors CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
    />

    <!-- endbuild -->

    <!-- Vendor -->
    <link
        rel="stylesheet"
        href="{{ asset('admin/vendor/libs/%40form-validation/form-validation.css') }}"
    />

    <!-- Page CSS -->
    <!-- Page -->
    <link
        rel="stylesheet"
        href="{{ asset('admin/vendor/css/pages/page-auth.css') }}"
    />

    <!-- Helpers -->
    <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>
    {{-- <script src="{{ asset('admin/vendor/js/template-customizer.js') }}"></script> --}}


    <script src="{{ asset('admin/js/config.js') }}"></script>
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

    <div class="container">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <div class="logos">
                                <img
                                    src="{{ asset('admin/img/logo.jpg') }}"
                                    alt="Logo Mamuju"
                                >
                            </div>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1">Selamat Datang 👋</h4>
                        <p class="mb-4">
                            Silahkan Daftarkan Akun Anda
                        </p>
                        @if ($errors->any())
                            <div
                                class="alert alert-danger alert-dismissible fade show"
                                role="alert"
                            >
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
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
                            action="{{ route('register') }}"
                            method="POST"
                        >
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-6 form-control-validation">
                                        <label
                                            for="name"
                                            class="form-label"
                                        >Nama Lengkap</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Masukkan Nama Lengkap"
                                            value="{{ old('name') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-6 form-control-validation">
                                        <label
                                            for="phone"
                                            class="form-label"
                                        >Nomor HP</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="phone"
                                            placeholder="Masukkan Nomor HP"
                                            value="{{ old('phone') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
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
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
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
                                                    class="icon-base bx bx-hide"
                                                ></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider">
                                    <div class="divider-text">Data Usaha</div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-6 form-control-validation">
                                        <label
                                            for="name"
                                            class="form-label"
                                        >Nama Usaha</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="store_name"
                                            placeholder="Masukkan Nama Usaha"
                                            value="{{ old('store_name') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-6 form-control-validation">
                                        <label
                                            for="name"
                                            class="form-label"
                                        >Pilih Lokasi Pasar</label>
                                        <select
                                            class="form-select"
                                            name="store_category_id"
                                            id="store_category_id"
                                            required
                                        >
                                            <option
                                                value=""
                                                selected
                                                disabled
                                            >Pilih Pasar</option>
                                            @foreach ($markets as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-6 form-control-validation">
                                        <label
                                            for="name"
                                            class="form-label"
                                        >Kategori Usaha</label>
                                        <select
                                            class="form-select"
                                            name="store_category_id"
                                            id="store_category_id"
                                            required
                                        >
                                            <option
                                                value=""
                                                selected
                                                disabled
                                            >Pilih Kategori</option>
                                            @foreach ($storeCategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-6">
                                    <label class="form-label">
                                        Nomor HP Usaha
                                    </label>
                                    <input
                                        type="number"
                                        name="store_phone"
                                        class="form-control"
                                        placeholder="Masukkan Nomor HP"
                                        required
                                    >
                                </div>
                                <div class="col-12 mb-6">
                                    <label class="form-label">
                                        Alamat Usaha
                                    </label>
                                    <input
                                        type="text"
                                        name="store_address"
                                        class="form-control"
                                        placeholder="Masukkan Alamat"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="mb-6">
                                <button
                                    class="btn btn-primary d-grid w-100"
                                    type="submit"
                                >Daftar</button>
                            </div>
                        </form>
                        <p class="text-center">
                            <span>Sudah punya akun ?</span>
                            <a href="{{ route('login') }}">
                                <span>Masuk</span>
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
    <!-- build:js admin/vendor/js/theme.js  -->


    <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/%40algolia/autocomplete-js.js') }}"></script>



    <script src="{{ asset('admin/vendor/libs/pickr/pickr.js') }}"></script>



    <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


    <script src="{{ asset('admin/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('admin/vendor/libs/i18n/i18n.js') }}"></script>


    <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/%40form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('admin/js/main.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('admin/js/pages-auth.js') }}"></script>
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
