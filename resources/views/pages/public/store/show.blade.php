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
    <section class="inner-section shop-part">
        detail usaha
    </section>
@endsection
