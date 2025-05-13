<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Market;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countMarket = Market::count();
        $countStore = Store::count();
        $countProduct = Product::count();
        return view('pages.admin.dashboard.index', compact([
            'countMarket',
            'countStore',
            'countProduct'
        ]));
    }
}
