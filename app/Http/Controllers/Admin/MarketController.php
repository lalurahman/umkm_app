<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\MarketDataTable;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index(MarketDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.market.index');
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
                'name.required' => 'Nama Pasar tidak boleh kosong',
                'name.string' => 'Nama Pasar harus berupa string',
                'name.max' => 'Nama Pasar maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            Market::create($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Create')
                ->log('Menambahkan pasar baru');
            DB::commit();
            return back()->with('success', 'Pasar berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // edit
    public function edit($id)
    {
        $market = Market::findOrFail($id);
        return view('pages.admin.market.edit', compact([
            'market',
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
                'name.required' => 'Nama Pasar tidak boleh kosong',
                'name.string' => 'Nama Pasar harus berupa string',
                'name.max' => 'Nama Pasar maksimal 255 karakter',
            ]);
            // save to database 
            $data['slug'] = str()->slug($request->name);
            Market::findOrFail($id)->update($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Update')
                ->log('Mengupdate Pasar');
            DB::commit();
            return to_route('admin.market.index')->with('success', 'Pasar berhasil diupdate');
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
            $market = Market::findOrFail($id);
            if ($market->stores()->count() > 0) {
                return Response::error(NULL, 'Pasar tidak dapat dihapus karena sudah memiliki usaha', 422);
            }
            // delete from database 
            $market->delete();
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => request()->ip()])
                ->event('Delete')
                ->log('Menghapus Pasar');
            DB::commit();
            return Response::success(NULL, 'Pasar berhasil dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::error(NULL, $th->getMessage(), 500);
        }
    }
}
