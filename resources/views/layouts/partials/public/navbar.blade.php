<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                        <li class="navbar-item">
                            <a
                                class="navbar-link"
                                href="{{ route('home') }}"
                            >beranda</a>
                        </li>
                        <li class="navbar-item dropdown">
                            <a
                                class="navbar-link dropdown-arrow"
                                href="#"
                            >pasar</a>
                            <ul class="dropdown-position-list">
                                @foreach ($market as $item)
                                    <li><a href="#">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="navbar-item dropdown">
                            <a
                                class="navbar-link dropdown-arrow"
                                href="#"
                            >kategori usaha</a>
                            <ul class="dropdown-position-list">
                                @foreach ($categories as $item)
                                    <li><a href="#">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="navbar-item">
                            <a
                                class="navbar-link"
                                href="{{ route('store.index') }}"
                            >usaha</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
