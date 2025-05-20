<?php

namespace App\DataTables\Store;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // $editUrl = route('admin.market.edit', $row->id);
                return <<<BLADE
                <div class="d-flex justify-content-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Aksi
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><button class="dropdown-item text-danger btn-delete" data-id="{$row->id}">Hapus</button></li>
                        </ul>
                    </div>
                </div>
            BLADE;
            })
            ->editColumn('image', function ($row) {
                return '<img src="' . asset('product/' . $row->image) . '" class="img-fluid" width="100" height="100">';
            })
            ->editColumn('productCategory.name', function ($row) {
                return $row->productCategory->name;
            })
            ->editColumn('price', function ($row) {
                return 'Rp. ' . number_format($row->price, 0, ',', '.');
            })
            ->rawColumns(['action', 'image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['productCategory'])
            ->where('store_id', Auth::user()->store_id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('No')->data('DT_RowIndex'),
            Column::make('name')->title('Nama Produk'),
            Column::make('productCategory.name')->title('Kategori Produk'),
            Column::make('price')->title('Harga'),
            Column::make('stock')->title('Stok'),
            Column::make('image')->title('Gambar'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Store\Product_' . date('YmdHis');
    }
}
