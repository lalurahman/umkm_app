<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $store = Store::all();
        return view('pages.public.home.index', compact([
            'store',
        ]));
    }
}
