<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StoreCategoryDataTable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreCategoryController extends Controller
{
    public function index(StoreCategoryDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.store_category.index');
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
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.string' => 'Nama Kategori harus berupa string',
                'name.max' => 'Nama Kategori maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            StoreCategory::create($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Create')
                ->log('Menambahkan kategori usaha baru');
            DB::commit();
            return back()->with('success', 'Kategori usaha berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // edit
    public function edit($id)
    {
        $storeCategory = StoreCategory::findOrFail($id);
        return view('pages.admin.store_category.edit', compact([
            'storeCategory',
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
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.string' => 'Nama Kategori harus berupa string',
                'name.max' => 'Nama Kategori maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            StoreCategory::findOrFail($id)->update($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Update')
                ->log('Mengupdate Kategori Usaha');
            DB::commit();
            return to_route('admin.store-categories.index')->with('success', 'Kategori usaha berhasil diupdate');
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
            $storeCategory = StoreCategory::findOrFail($id);
            // delete from database 
            $storeCategory->delete();
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => request()->ip()])
                ->event('Delete')
                ->log('Menghapus Kategori Usaha');
            DB::commit();
            return Response::success(NULL, 'Kategori usaha berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::error(NULL, $th->getMessage(), 500);
        }
    }
}
