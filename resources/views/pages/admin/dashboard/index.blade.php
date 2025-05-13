@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div
            class="alert alert-primary alert-dismissible"
            role="alert"
        >
            <h4 class="alert-heading d-flex align-items-center justify-content-center flex-wrap gap-1">
                Selamat Datang di Aplikasi Umkm Kota Mamuju
            </h4>
            <hr>
        </div>
        <div class="row g-6">
            <!-- Card Border Shadow -->
            <div class="col-lg-4 col-sm-6">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="icon-base bx bx-store icon-lg"></i>
                                </span>
                            </div>
                            <h4 class="mb-0">{{ $countMarket }}</h4>
                        </div>
                        <p class="mt-5">Jumlah Pasar</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="icon-base bx bx-store icon-lg"></i>
                                </span>
                            </div>
                            <h4 class="mb-0">{{ $countStore }}</h4>
                        </div>
                        <p class="mt-5">Jumlah Umkm</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="avatar me-4">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="icon-base bx bx-store icon-lg"></i>
                                </span>
                            </div>
                            <h4 class="mb-0">{{ $countProduct }}</h4>
                        </div>
                        <p class="mt-5">Jumlah Produk</p>
                    </div>
                </div>
            </div>
            <!--/ Card Border Shadow -->
        </div>
    </div>
@endsection
