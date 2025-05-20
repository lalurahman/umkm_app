@extends('layouts.public')

@section('content')
    <section
        class="single-banner inner-section justify-content-center d-flex align-items-center"
        style="background-color: aquamarine; height: 200px;"
    >
        <div class="container">
            <h2>Usaha</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('store.index') }}">Usaha</a>
                </li>
                @if (request()->segment(2))
                    <li class="breadcrumb-item">
                        {{ request()->segment(2) }}
                    </li>
                @endif
                @if (request()->segment(3))
                    <li class="breadcrumb-item">
                        {{ request()->segment(3) }}
                    </li>
                @endif
            </ol>
        </div>
    </section>
    <section class="inner-section">
        @if ($products->count() > 0)
            <div class="container">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
                    @foreach ($products as $item)
                        <div class="col">
                            <div class="product-card">
                                <div class="product-media">
                                    <a
                                        class="product-image"
                                        href="#"
                                    >
                                        <img
                                            src="{{ asset('product/' . $item->image) }}"
                                            alt="product"
                                        >
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h6 class="product-name">
                                        <a href="#">{{ $item->name }}</a>
                                    </h6>
                                    <h6 class="product-price">
                                        <span>Rp. {{ number_format($item->price) }}<small>
                                                /
                                                pcs</small></span>
                                    </h6>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-add">
                                                <i class="fas fa-eye"></i>
                                                <a
                                                    href="#"
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
                        <div class="bottom-paginate">
                            <p class="page-info">
                                Showing {{ $products->count() }} of {{ $products->total() }} results
                            </p>
                            @if ($products->lastPage() > 1)
                                <ul class="pagination">
                                    <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                        <a
                                            class="page-link"
                                            href="{{ $products->previousPageUrl() }}"
                                            aria-label="Previous"
                                        >
                                            <i class="fas fa-long-arrow-alt-left"></i>
                                        </a>
                                    </li>

                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                            <a
                                                class="page-link"
                                                href="{{ $products->appends(['name' => request()->name])->url($i) }}"
                                            >{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                        <a
                                            class="page-link"
                                            href="{{ $products->nextPageUrl() }}"
                                            aria-label="Next"
                                        >
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>Produk tidak ditemukan</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
