<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\Store;
use App\Models\StoreCategory;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $storeCategories = StoreCategory::all();
        $markets = Market::all();
        return view('auth.register', compact([
            'markets',
            'storeCategories'
        ]));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'store_category_id' => ['required', 'exists:store_categories,id'],
            'market_id' => ['required', 'exists:markets,id'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $store = Store::create([
            'name' => $request->store_name,
            'store_category_id' => $request->store_category_id,
            'market_id' => $request->market_id,
            'phone' => $request->store_phone,
            'address' => $request->store_address,
            'slug' => str()->slug($request->store_name),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'store_id' => $store->id,
            'role_id' => 3, // 3 = store
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('store.dashboard', absolute: false));
    }
}
