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
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#basicModal"
                >
                    <i class="icon-base bx bx-plus icon-sm me-0 me-sm-2"></i>
                    Tambah Data
                </button>
            </div>
        </div>

        <!-- table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        <!-- end table -->
    </div>
@endsection

@push('modal')
    <div
        class="modal fade"
        id="basicModal"
        tabindex="-1"
        style="display: none;"
        aria-hidden="true"
    >
        <div
            class="modal-dialog"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title"
                        id="exampleModalLabel1"
                    >Tambah Usaha</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form
                    action="#"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="modal-body">
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
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-6">
                                <label class="form-label">
                                    Nama Usaha
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Masukkan Nama Kategori"
                                    required
                                >
                            </div>
                            <div class="col-12 mb-6">
                                <label class="form-label">
                                    Nomor HP
                                </label>
                                <input
                                    type="number"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Masukkan Nomor HP"
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
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                        >Close</button>
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/datatables/datatables-bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            const datatable = $('#store-table');
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();

                const _ = $(this);

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Tindakan ini akan menghapus data secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, saya yakin!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = _.data('id');
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: '{{ route('admin.stores.destroy', ':id') }}'
                                .replace(
                                    ':id', id),
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: res.message,
                                    icon: 'success'
                                }).then(function() {
                                    datatable.DataTable().ajax.reload();
                                });
                            },
                            error: function(res) {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: res.responseJSON.message,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        })
    </script>
@endpush
