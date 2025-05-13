<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StoreUserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreUserController extends Controller
{
    public function index($id)
    {
        $store = Store::findOrFail($id);
        $users = User::where('store_id', $id)->get();
        return view('pages.admin.store_user.index', compact([
            'store',
            'users',
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
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'name.string' => 'Nama harus berupa string',
                'name.max' => 'Nama maksimal 255 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.max' => 'Email maksimal 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.string' => 'Password harus berupa string',
            ]);
            // save to database
            $data['password'] = Hash::make($request->password);
            $data['store_id'] = $request->store_id;
            $data['role_id'] = 3;
            User::create($data);
            // add log activity
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Create')
                ->log('Menambahkan user baru');
            DB::commit();
            return back()->with('success', 'User berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
