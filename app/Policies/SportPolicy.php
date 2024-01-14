<?php

namespace App\Policies;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SportPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true; // Accorder tous les droits à un utilisateur ADMIN
        }
    }

    public function update(User $user, Sport $sport)
    {
        return $user->id === $sport->user_id;
    }

    public function delete(User $user, Sport $sport)
    {
        return $user->id === $sport->user_id;
    }
}
