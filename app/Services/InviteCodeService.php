<?php
namespace App\Services;

use App\Models\InviteCode;
use App\Models\InviteCodeUsage;
use Carbon\Carbon;

class InviteCodeService
{
    public function generateForCompany($company)
    {
        $existingCode = InviteCode::where('company_id', $company->id)
            ->where('expires_at', '>', now())
            ->first();

        if ($existingCode) {
            return $existingCode;
        }

        return InviteCode::create([
            'company_id' => $company->id,
            'code' => InviteCode::generateCode(),
            'expires_at' => now()->addHours(3),
        ]);
    }

    public function validateCode($code)
    {
        return InviteCode::where('code', $code)
            ->where('expires_at', '>', now())
            ->first();
    }

    public function trackUserJoin(InviteCode $inviteCode, $userId)
    {
        return InviteCodeUsage::create([
            'invite_code_id' => $inviteCode->id,
            'user_id' => $userId,
            'used_at' => now(),
        ]);
    }

    public function getCodeData(InviteCode $inviteCode)
    {
        return [
            'code' => $inviteCode->code,
            'company' => $inviteCode->company->name,
            'total_joins' => $inviteCode->usages()->count(),
            'created_at' => $inviteCode->created_at,
            'expires_at' => $inviteCode->expires_at,
            'is_active' => $inviteCode->isValid(),
            'users' => $inviteCode->usages()
                ->with('user')
                ->orderBy('used_at', 'desc')
                ->get()
                ->map(fn($usage) => [
                    'name' => $usage->user->name,
                    'email' => $usage->user->email,
                    'used_at' => $usage->used_at->format('Y-m-d H:i:s')
                ])
        ];
    }
}
