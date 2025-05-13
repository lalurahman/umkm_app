<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function storeCategory()
    {
        return $this->belongsTo(StoreCategory::class);
    }
    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
