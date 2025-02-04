<?php
namespace App\Services;

use App\Models\InviteCode;
use Carbon\Carbon;

class InviteCodeService
{
    public function generateForUser($user)
    {
        // Check for existing valid code
        $existingCode = InviteCode::where('user_id', $user->id)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if ($existingCode) {
            return $existingCode;
        }

        // Create new code
        return InviteCode::create([
            'user_id' => $user->id,
            'code' => InviteCode::generateCode(),
            'expires_at' => now()->addHours(3),
        ]);
    }

    public function validateCode($code)
    {
        $inviteCode = InviteCode::where('code', $code)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$inviteCode) {
            return null;
        }

        return $inviteCode;
    }

    public function markAsUsed(InviteCode $inviteCode)
    {
        $inviteCode->update([
            'used' => true
        ]);

        return $inviteCode;
    }
}
