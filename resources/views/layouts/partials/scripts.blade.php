<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/%40algolia/autocomplete-js.js') }}"></script>



<script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>


<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>

{{-- <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script> --}}


<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->

<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const semiDarkToggle = document.querySelector('[data-semi-dark-toggle]');

        // Load current state from localStorage
        const isSemiDark = localStorage.getItem('templateCustomizer-' + document.documentElement.getAttribute(
            'data-template') + '--SemiDark') === 'true';
        if (semiDarkToggle) {
            semiDarkToggle.checked = isSemiDark;
        }

        semiDarkToggle?.addEventListener('change', function(e) {
            const isChecked = e.target.checked;
            if (isChecked) {
                document.documentElement.setAttribute('data-semidark-menu', 'true');
                document.getElementById('layout-menu')?.setAttribute('data-bs-theme', 'dark');
            } else {
                document.documentElement.removeAttribute('data-semidark-menu');
                document.getElementById('layout-menu')?.removeAttribute('data-bs-theme');
            }

            // Save state to localStorage
            const layoutName = document.documentElement.getAttribute('data-template');
            localStorage.setItem(`templateCustomizer-${layoutName}--SemiDark`, isChecked);
        });
    });
</script>
<script>
    $('.select2').select2();
    @if (session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
        });
    @endif

    @if (session('error'))
        Swal.fire({
            title: 'Gagal!',
            text: '{{ session('error') }}',
            icon: 'error',
        });
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            Swal.fire({
                title: 'Gagal!',
                text: '{{ $error }}',
                icon: 'error',
            });
        @endforeach
    @endif
    $(document).on('click', '#btn-logout', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        Swal.fire({
            title: 'Apakah anda yakin ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal!',
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                form.submit();
            }
        });
    });
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
