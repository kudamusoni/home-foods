<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['iso_code', 'name'];

    public function scopeIsoCode($query, String $iso) {
        return $query->where('iso_code', $iso);
    }
}
