<aside class="category-sidebar">
    <div class="category-header">
        <h4 class="category-title">
            <i class="fas fa-align-left"></i>
            <span>Pasar</span>
        </h4>
        <button class="category-close"><i class="icofont-close"></i></button>
    </div>
    <ul class="category-list">
        @foreach ($market as $item)
            <li class="category-item">
                <a
                    class="category-link"
                    href="#"
                >
                    <i class="">
                        <img
                            src=""
                            alt=""
                            width="30"
                        >
                    </i>
                    <span>{{ $item->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="category-footer">
        <p>All Rights Reserved by <a href="#">UMKM Mamuju</a></p>
    </div>
</aside>
