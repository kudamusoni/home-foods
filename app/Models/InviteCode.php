<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InviteCode extends Model
{
    protected $fillable = [
        'company_id',
        'code',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function usages()
    {
        return $this->hasMany(InviteCodeUsage::class);
    }

    public function isValid()
    {
        return $this->expires_at->isFuture();
    }

    public static function generateCode()
    {
        do {
            $code = strtoupper(Str::random(8));
        } while (static::where('code', $code)->exists());

        return $code;
    }
}
