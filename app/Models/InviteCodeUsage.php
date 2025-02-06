<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InviteCodeUsage extends Model
{
    protected $fillable = [
        'invite_code_id',
        'user_id',
        'used_at'
    ];

    protected $casts = [
        'used_at' => 'datetime'
    ];

    public function inviteCode()
    {
        return $this->belongsTo(InviteCode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
