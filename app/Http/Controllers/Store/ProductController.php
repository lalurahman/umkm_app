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
        $productCategories = ProductCategory::where('store_id', $auth->store_id)->get();
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
                'product_category_id' => 'required|exists:product_categories,id',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            ], [
                'name.required' => 'Nama Produk tidak boleh kosong',
                'name.string' => 'Nama Produk harus berupa string',
                'name.max' => 'Nama Produk maksimal 255 karakter',
                'product_category_id.required' => 'Kategori Produk tidak boleh kosong',
                'product_category_id.exists' => 'Kategori Produk tidak valid',
                'description.string' => 'Deskripsi Produk harus berupa string',
                'price.required' => 'Harga Produk tidak boleh kosong',
                'price.numeric' => 'Harga Produk harus berupa angka',
                'stock.required' => 'Stok Produk tidak boleh kosong',
                'stock.numeric' => 'Stok Produk harus berupa angka',
                'image.required' => 'Gambar Produk tidak boleh kosong',
                'image.image' => 'Gambar Produk harus berupa gambar',
                'image.mimes' => 'Gambar Produk harus berupa file dengan ekstensi jpg, jpeg, png',
                'image.max' => 'Gambar Produk maksimal 5MB',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            $data['store_id'] = Auth::user()->store?->id;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . str_replace(' ', '-', strtolower($file->getClientOriginalName()));
                $file->move(public_path('product'), $filename);
                $data['image'] = $filename;
            }
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
                'product_category_id' => 'required|exists:product_categories,id',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            ], [
                'name.required' => 'Nama Produk tidak boleh kosong',
                'name.string' => 'Nama Produk harus berupa string',
                'name.max' => 'Nama Produk maksimal 255 karakter',
                'product_category_id.required' => 'Kategori Produk tidak boleh kosong',
                'product_category_id.exists' => 'Kategori Produk tidak valid',
                'description.string' => 'Deskripsi Produk harus berupa string',
                'price.required' => 'Harga Produk tidak boleh kosong',
                'price.numeric' => 'Harga Produk harus berupa angka',
                'stock.required' => 'Stok Produk tidak boleh kosong',
                'stock.numeric' => 'Stok Produk harus berupa angka',
                'image.required' => 'Gambar Produk tidak boleh kosong',
                'image.image' => 'Gambar Produk harus berupa gambar',
                'image.mimes' => 'Gambar Produk harus berupa file dengan ekstensi jpg, jpeg, png',
                'image.max' => 'Gambar Produk maksimal 5MB',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . str_replace(' ', '-', strtolower($file->getClientOriginalName()));
                $file->move(public_path('product'), $filename);
                $data['image'] = $filename;
                // delete old image
                $oldImage = Product::findOrFail($id)->image;
                if ($oldImage) {
                    $oldImagePath = public_path('product/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
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
