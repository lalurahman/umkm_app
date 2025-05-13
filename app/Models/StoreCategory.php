<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    protected $guarded = [];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
