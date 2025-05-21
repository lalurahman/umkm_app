@extends('layouts.public')

@section('title', 'Offline Mode')
@section('content')
    <section class="banner-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-0 order-lg-1 order-xl-1">
                    <div class="home-grid-slider slider-arrow slider-dots">
                        <a href="#"><img
                                src="{{ asset('assets/images/banner2.png') }}"
                                alt=""
                            ></a>
                        <a href="#"><img
                                src="{{ asset('assets/images/banner1.png') }}"
                                alt=""
                            ></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section recent-part mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>rekomendasi usaha</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach ($store as $item)
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <a
                                    class="product-image"
                                    href="#"
                                >
                                    <img
                                        src="{{ asset('assets/images/store.png') }}"
                                        alt="product"
                                    >
                                </a>
                            </div>
                            <div class="product-content">
                                <h6 class="product-name">
                                    <a href="{{ route('store.show', $item->slug) }}">{{ $item->name }}</a>
                                </h6>
                                <h6 class="product-price">
                                    <span>{{ $item->market?->name }}</span>
                                </h6>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-add">
                                            <i class="fas fa-eye"></i>
                                            <a
                                                href="{{ route('store.show', $item->slug) }}"
                                                class="text-dark"
                                            >Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25">
                        <a
                            href="{{ route('store.index') }}"
                            class="btn btn-outline"
                        >
                            <i class="fas fa-eye"></i>
                            <span>lihat usaha lainnya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
