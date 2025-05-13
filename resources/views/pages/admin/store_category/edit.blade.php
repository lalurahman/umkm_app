@extends('layouts.admin')

@section('title', 'Kategori Usaha')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom-icon">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Admin</a>
                    <i class="breadcrumb-icon icon-base bx bx-chevron-right align-middle"></i>
                </li>
                <li class="breadcrumb-item active">Kategori Usaha</li>
            </ol>
        </nav>
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Data Kategori Usaha</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <a
                    href="{{ route('admin.store-categories.index') }}"
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
                action="{{ route('admin.store-categories.update', $storeCategory->id) }}"
                method="post"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-6">
                            <label class="form-label">
                                Nama Kategori
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan Nama Kategori"
                                value="{{ $storeCategory->name }}"
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
