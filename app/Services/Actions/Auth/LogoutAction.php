<?php

namespace App\Services\Actions\Auth;

use App\Models\User;

class LogoutAction
{

    public function run(User $user): void
    {
        $user->token()->revoke();
    }
}
