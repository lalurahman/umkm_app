<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(50);
        return view('pages.public.store.index', compact([
            'stores',
        ]));
    }

    public function show($slug)
    {
        $store = Store::where('slug', $slug)->firstOrFail();
        $products = $store->products()->paginate(50);
        return view('pages.public.store.show', compact([
            'store',
            'products',
        ]));
    }
}
