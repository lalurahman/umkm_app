@extends('layouts.admin')

@section('title', 'Usaha')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom-icon">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Admin</a>
                    <i class="breadcrumb-icon icon-base bx bx-chevron-right align-middle"></i>
                </li>
                <li class="breadcrumb-item active">Usaha</li>
            </ol>
        </nav>
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Data Usaha</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <a
                    href="{{ route('admin.stores.index') }}"
                    class="btn btn-secondary"
                >
                    <i class="icon-base bx bx-arrow-back icon-sm me-0 me-sm-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <!-- table -->
        <div class="card">
            <form
                action="{{ route('admin.stores.update', $store->id) }}"
                method="post"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-6">
                            <label class="form-label">
                                Pilih Pasar
                            </label>
                            <select
                                class="form-select"
                                name="market_id"
                                id="market_id"
                                required
                            >
                                <option
                                    value=""
                                    selected
                                    disabled
                                >Pilih Pasar</option>
                                @foreach ($markets as $item)
                                    <option
                                        value="{{ $item->id }}"
                                        @if ($store->market_id == $item->id) selected @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-6">
                            <label class="form-label">
                                Pilih Kategori
                            </label>
                            <select
                                class="form-select"
                                name="store_category_id"
                                id="store_category_id"
                                required
                            >
                                <option
                                    value=""
                                    selected
                                    disabled
                                >Pilih Kategori</option>
                                @foreach ($storeCategories as $item)
                                    <option
                                        value="{{ $item->id }}"
                                        @if ($store->store_category_id == $item->id) selected @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-6">
                            <label class="form-label">
                                Nama Usaha
                            </label>
                            <input
                                type="number"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan Nama Usaha"
                                value="{{ $store->name }}"
                                required
                            >
                        </div>
                        <div class="col-12 mb-6">
                            <label class="form-label">
                                Nomor HP
                            </label>
                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                placeholder="Masukkan Nomor HP"
                                value="{{ $store->phone }}"
                                required
                            >
                        </div>
                        <div class="col-12 mb-6">
                            <label class="form-label">
                                Alamat
                            </label>
                            <input
                                type="text"
                                name="address"
                                class="form-control"
                                placeholder="Masukkan Alamat"
                                value="{{ $store->address }}"
                                required
                            >
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >Simpan</button>
                </div>
            </form>
        </div>
        <!-- end table -->
    </div>
@endsection
