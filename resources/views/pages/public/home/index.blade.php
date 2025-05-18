@extends('layouts.public')

@section('content')
    {{-- <div class="banner-part">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="home-category-slider slider-arrow slider-dots">
                        <a href="#"><img
                                src="{{ asset('assets/images/home/category/01.jpg') }}"
                                alt="banner"
                            ></a>
                        <a href="#"><img
                                src="{{ asset('assets/images/home/category/02.jpg') }}"
                                alt="banner"
                            ></a>
                        <a href="#"><img
                                src="{{ asset('assets/images/home/category/03.jpg') }}"
                                alt="banner"
                            ></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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
                                    <a href="#">{{ $item->name }}</a>
                                </h6>
                                <h6 class="product-price">
                                    <span>{{ $item->market?->name }}</span>
                                </h6>
                                <button
                                    class="product-add"
                                    title="Add to Cart"
                                >
                                    <span>Lihat Detail</span>
                                </button>
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
                            <span>lihat lainnya</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).on('click', '#stokHabis', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Stok Habis!',
                icon: 'warning',
            });
        });
    </script>
@endpush
