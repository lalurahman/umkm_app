<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StoreDataTable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(StoreDataTable $dataTable)
    {
        $storeCategories = StoreCategory::all();
        $markets = Market::all();
        return $dataTable->render('pages.admin.store.index', compact([
            'storeCategories',
            'markets'
        ]));
    }

    // store
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $request->validate([
                'market_id' => 'required|exists:markets,id',
                'store_category_id' => 'required|exists:store_categories,id',
                'name' => 'required|string|max:255',
            ], [
                'market_id.required' => 'Pasar tidak boleh kosong',
                'market_id.exists' => 'Pasar tidak ditemukan',
                'store_category_id.required' => 'Kategori Usaha tidak boleh kosong',
                'store_category_id.exists' => 'Kategori Usaha tidak ditemukan',
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.string' => 'Nama Kategori harus berupa string',
                'name.max' => 'Nama Kategori maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            Store::create($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Create')
                ->log('Menambahkan usaha baru');
            DB::commit();
            return back()->with('success', 'Usaha berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // edit
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $storeCategories = StoreCategory::all();
        $markets = Market::all();
        return view('pages.admin.store.edit', compact([
            'store',
            'storeCategories',
            'markets'
        ]));
    }

    // update
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $request->validate([
                'market_id' => 'required|exists:markets,id',
                'store_category_id' => 'required|exists:store_categories,id',
                'name' => 'required|string|max:255',
            ], [
                'market_id.required' => 'Pasar tidak boleh kosong',
                'market_id.exists' => 'Pasar tidak ditemukan',
                'store_category_id.required' => 'Kategori Usaha tidak boleh kosong',
                'store_category_id.exists' => 'Kategori Usaha tidak ditemukan',
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.string' => 'Nama Kategori harus berupa string',
                'name.max' => 'Nama Kategori maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            Store::findOrFail($id)->update($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Update')
                ->log('Mengupdate Usaha');
            DB::commit();
            return to_route('admin.stores.index')->with('success', 'Usaha berhasil diupdate');
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
            $store = Store::findOrFail($id);
            // check if store has products
            if ($store->products()->count() > 0) {
                return Response::error(NULL, 'Usaha tidak dapat dihapus karena memiliki produk', 400);
            }
            if ($store->productCategories()->count() > 0) {
                return Response::error(NULL, 'Usaha tidak dapat dihapus karena memiliki kategori produk', 400);
            }
            if ($store->user()->count() > 0) {
                return Response::error(NULL, 'Usaha tidak dapat dihapus karena memiliki pengguna', 400);
            }
            // delete from database 
            $store->delete();
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => request()->ip()])
                ->event('Delete')
                ->log('Menghapus Usaha');
            DB::commit();
            return Response::success(NULL, 'Usaha berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::error(NULL, $th->getMessage(), 500);
        }
    }
}
