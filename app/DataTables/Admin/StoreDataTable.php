<?php

namespace App\DataTables\Admin;

use App\Models\Store;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StoreDataTable extends DataTable
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
                $editUrl = route('admin.stores.edit', $row->id);
                $userUrl = route('admin.store-users.index', $row->id);
                return <<<BLADE
                <div class="d-flex justify-content-center">
                    <div class="btn-group">
                        <a href="$userUrl" class="btn btn-sm btn-outline-primary">
                            <i class="bx bx-user"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Aksi
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="$editUrl">Edit</a></li>
                            <li><button class="dropdown-item text-danger btn-delete" data-id="{$row->id}">Hapus</button></li>
                        </ul>
                    </div>
                </div>
            BLADE;
            })
            ->editColumn('storeCategory.name', function ($row) {
                return $row->storeCategory->name ?? '-';
            })
            ->editColumn('market.name', function ($row) {
                return $row->market->name ?? '-';
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Store $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['storeCategory', 'market']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('store-table')
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
            Column::make('name')->title('Nama Usaha'),
            Column::make('address')->title('Alamat Usaha'),
            Column::make('phone')->title('No. Telepon'),
            Column::make('storeCategory.name')->title('Kategori'),
            Column::make('market.name')->title('Pasar'),
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
        return 'Admin\Store_' . date('YmdHis');
    }
}
