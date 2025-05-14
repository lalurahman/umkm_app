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
                <li><a href="#">shop 5 column</a></li>
            </ul>
        </li>
    </ul>
    <div class="nav-info-group">
        <div class="nav-info">
            <i class="icofont-ui-touch-phone"></i>
            <p>
                <small>call us</small>
                <span>(+880) 183 8288 389</span>
            </p>
        </div>
        <div class="nav-info">
            <i class="icofont-ui-email"></i>
            <p>
                <small>email us</small>
                <span>support@greeny.com</span>
            </p>
        </div>
    </div>
    <div class="nav-footer">
        <p>All Rights Reserved by <a href="#">UMKM Mamuju</a></p>
    </div>
    </div>
</aside>
