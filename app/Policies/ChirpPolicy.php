<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;

final class ChirpPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chirp $chirp): bool
    {
        return $chirp->user()->is($user);
    }

    public function delete(User $user, Chirp $chirp): bool
    {
        return $this->update($user, $chirp);
    }
}
