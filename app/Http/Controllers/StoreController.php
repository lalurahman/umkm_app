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
        return view('pages.public.store.show');
    }
}
