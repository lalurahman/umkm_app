<aside
    id="layout-menu"
    class="layout-menu menu-vertical menu"
>

    <div class="app-brand demo ">
        <a
            href="{{ route('admin.dashboard') }}"
            class="app-brand-link"
        >
            <span class="app-brand-text demo menu-text fw-bold ms-2">
                <img
                    src="{{ asset('admin/img/logo.jpg') }}"
                    width="50"
                >
            </span>
        </a>

        <a
            href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto"
        >
            <i class="icon-base bx bx-chevron-left"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 pt-5">
        <!-- Dashboards -->
        <li class="menu-item @if (request()->is('administrator')) active open @endif">
            <a
                href="{{ route('admin.dashboard') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-home-smile"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Data Master -->
        <li class="menu-header small">
            <span class="menu-header-text">Admin</span>
        </li>
        <li class="menu-item @if (request()->is('administrator/market*')) active open @endif">
            <a
                href="{{ route('admin.market.index') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-store"></i>
                <div>Data Pasar</div>
            </a>
        </li>
        <li class="menu-item @if (request()->is('administrator/store-categories*')) active open @endif">
            <a
                href="{{ route('admin.store-categories.index') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-store"></i>
                <div>Data Kategori Usaha</div>
            </a>
        </li>
        <li class="menu-item @if (request()->is('administrator/stores*')) active open @endif">
            <a
                href="{{ route('admin.stores.index') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-store"></i>
                <div>Data Usaha</div>
            </a>
        </li>
    </ul>


</aside>
