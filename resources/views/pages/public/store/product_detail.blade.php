@extends('layouts.public')

@section('content')
    <section
        class="single-banner inner-section justify-content-center d-flex align-items-center"
        style="background-color: aquamarine; height: 200px;"
    >
        <div class="container">
            <h2>Detail Product</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >{{ $product->slug }}</li>
            </ol>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-gallery">
                        <ul class="details-preview">
                            <li>
                                <img
                                    src="{{ asset('product/' . $product->image) }}"
                                    alt="product"
                                >
                            </li>
                        </ul>
                        <ul class="details-thumb">
                            <li>
                                <img
                                    src="{{ asset('product/' . $product->image) }}"
                                    alt="product"
                                >
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details-content">
                        <h3 class="details-name"><a href="#">{{ $product->name }}</a></h3>
                        <div class="view-list-group">
                            <label class="view-list-title">Kategori :</label>
                            <ul class="view-tag-list">
                                <li>
                                    <a href="#">
                                        {{ $product->productCategory->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="view-meta">
                            <p>STOK :<span>{{ $product->stock }}</span></p>
                        </div>
                        <h3 class="details-price">
                            <span>Rp. {{ number_format($product->price) }}<small> /
                                    pcs</small></span>
                        </h3>
                        <p class="details-desc">
                            {!! $product->description !!}
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <a
                                    href="https://api.whatsapp.com/send?phone={{ $auth->phone }}&text=Hallo%20Saya%20ingin%20memesan%20produk%20{{ $product->name }}%20dari%20toko%20{{ $auth->store->name }}"
                                    target="_blank"
                                    class="product-add btn-primary bg-info"
                                >
                                    <span>Beli Produk</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/product-details.css') }}"
    >
    <meta
        property="og:image"
        content="{{ asset('product/' . $product->image) }}"
    />
    <meta
        property="og:title"
        content="{{ $product->name }}"
    />
@endpush
