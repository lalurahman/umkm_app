<aside class="nav-sidebar">
    <div class="nav-header">
        <a href="#"><img
                src="{{ asset('admin/img/logo.jpg') }}"
                alt="logo"
            ></a>
        <button class="nav-close"><i class="icofont-close"></i></button>
    </div>
    <div class="nav-content">
        <div class="nav-btn">
            <a
                href="{{ route('login') }}"
                class="btn btn-inline"
            >
                <i class="fa fa-unlock-alt"></i>
                <span>masuk</span>
            </a>
        </div>
    </div>
    <ul class="nav-list">
        <li>
            <a
                class="nav-link"
                href="#"
            ><i class="icofont-home"></i>Beranda</a>
        </li>
        <li>
            <a
                class="nav-link dropdown-link"
                href="#"
            ><i class="icofont-food-cart"></i>pasar</a>
            <ul class="dropdown-list">
                @foreach ($market as $item)
                    <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a
                class="nav-link dropdown-link"
                href="#"
            ><i class="icofont-food-cart"></i>kategori usaha</a>
            <ul class="dropdown-list">
                @foreach ($categories as $item)
                    <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</aside>
