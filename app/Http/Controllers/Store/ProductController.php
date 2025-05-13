<?php

namespace App\Http\Controllers\Store;

use App\DataTables\Store\ProductDataTable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        $auth = Auth::user();
        $productCategories = ProductCategory::where('store_id', $auth->store->id)->get();
        return $dataTable->render('pages.store.product.index', compact([
            'productCategories',
        ]));
    }

    // store
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'Nama Produk tidak boleh kosong',
                'name.string' => 'Nama Produk harus berupa string',
                'name.max' => 'Nama Produk maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            Product::create($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Create')
                ->log('Menambahkan produk baru');
            DB::commit();
            return back()->with('success', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.store.product.edit', compact([
            'product',
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
                'name.required' => 'Nama Produk tidak boleh kosong',
                'name.string' => 'Nama Produk harus berupa string',
                'name.max' => 'Nama Produk maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            Product::findOrFail($id)->update($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Update')
                ->log('Mengupdate Produk');
            DB::commit();
            return to_route('admin.market.index')->with('success', 'Produk berhasil diupdate');
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
            $product = Product::findOrFail($id);
            if ($product->galleries()->count() > 0) {
                return Response::error(NULL, 'Produk tidak dapat dihapus karena memiliki gallery', 422);
            }
            // delete from database 
            $product->delete();
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => request()->ip()])
                ->event('Delete')
                ->log('Menghapus Produk');
            DB::commit();
            return Response::success(NULL, 'Produk berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::error(NULL, $th->getMessage(), 500);
        }
    }
}
