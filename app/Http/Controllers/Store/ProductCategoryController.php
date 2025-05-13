<?php

namespace App\Http\Controllers\Store;

use App\DataTables\Store\ProductCategoryDataTable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function index(ProductCategoryDataTable $dataTable)
    {
        return $dataTable->render('pages.store.product_category.index');
    }

    // store
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $auth = Auth::user();
            $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'Nama kategori tidak boleh kosong',
                'name.string' => 'Nama kategori harus berupa string',
                'name.max' => 'Nama kategori maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            $data['store_id'] = $auth->store_id;
            ProductCategory::create($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Create')
                ->log('Menambahkan kategori produk baru');
            DB::commit();
            return back()->with('success', 'kategori roduk berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // edit
    public function edit($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return view('pages.store.product_category.edit', compact([
            'productCategory',
        ]));
    }

    // update
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'Nama kategori tidak boleh kosong',
                'name.string' => 'Nama kategori harus berupa string',
                'name.max' => 'Nama kategori maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            ProductCategory::findOrFail($id)->update($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Update')
                ->log('Mengupdate Kategori');
            DB::commit();
            return to_route('store.product-categories.index')->with('success', 'Kategori berhasil diupdate');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
    // destroy
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $productCategory = ProductCategory::findOrFail($id);
            if ($productCategory->products()->count() > 0) {
                return Response::error(NULL, 'Kategori tidak dapat dihapus karena memiliki produk', 422);
            }
            // delete from database 
            $productCategory->delete();
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => request()->ip()])
                ->event('Delete')
                ->log('Menghapus Kategori');
            DB::commit();
            return Response::success(NULL, 'Kategori berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::error(NULL, $th->getMessage(), 500);
        }
    }
}
