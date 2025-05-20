<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user"><img
                        src="{{ asset('assets/images/user.png') }}"
                        alt="user"
                    ></button>
                <a href="{{ route('home') }}"><img
                        src="{{ asset('admin/img/logo.jpg') }}"
                        alt="logo"
                    ></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>

            <a
                href="{{ route('home') }}"
                class="header-logo"
            >
                <img
                    src="{{ asset('admin/img/logo.jpg') }}"
                    alt="logo"
                >
            </a>
            @if (Auth::check())
                <a
                    href="{{ route('store.dashboard') }}"
                    class="header-widget"
                    title="My Account"
                >
                    <img
                        src="{{ asset('assets/images/user.png') }}"
                        alt="user"
                    >
                    <span>Dashboard</span>
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="header-widget"
                    title="My Account"
                >
                    <img
                        src="{{ asset('assets/images/user.png') }}"
                        alt="user"
                    >
                    <span>Masuk</span>
                </a>
            @endif

            <form class="header-form">
                <input
                    type="text"
                    placeholder="Cari apapun..."
                >
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</header>
