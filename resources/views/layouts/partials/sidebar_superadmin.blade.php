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
                    width="100"
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
        <li class="menu-item @if (request()->is('superadmin')) active open @endif">
            <a
                href="{{ route('superadmin.dashboard') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-home-smile"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Data Master -->
        <li class="menu-header small">
            <span class="menu-header-text">Superadmin</span>
        </li>

        <li class="menu-item @if (request()->is('superadmin/medicine-category*') || request()->is('superadmin/specialization*')) active open @endif">
            <a
                href="javascript:void(0);"
                class="menu-link menu-toggle"
            >
                <i class="menu-icon icon-base bx bx-layout"></i>
                <div>Data Master</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item @if (request()->is('superadmin/medicine-category*')) active @endif">
                    <a
                        href="{{ route('superadmin.medicine-category.index') }}"
                        class="menu-link"
                    >
                        <div>Kategori Obat</div>
                    </a>
                </li>
                <li class="menu-item @if (request()->is('superadmin/specialization*')) active @endif">
                    <a
                        href="{{ route('superadmin.specialization.index') }}"
                        class="menu-link"
                    >
                        <div>Spesialis Dokter</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (request()->is('superadmin/doctor*')) active open @endif">
            <a
                href="{{ route('superadmin.doctor.index') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-user"></i>
                <div>Data Dokter</div>
            </a>
        </li>
        <li class="menu-item @if (request()->is('superadmin/patient*')) active open @endif">
            <a
                href="{{ route('superadmin.patient.index') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-user"></i>
                <div>Data Pasien</div>
            </a>
        </li>
        <li class="menu-item @if (request()->is('superadmin/log-activity*')) active open @endif">
            <a
                href="{{ route('superadmin.log-activity.index') }}"
                class="menu-link"
            >
                <i class="menu-icon icon-base bx bx-time"></i>
                <div>Log Activity</div>
            </a>
        </li>
    </ul>


</aside>
