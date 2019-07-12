<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
   public function equal(User $user1, User $user2)
    {
        return $user1->id === $user2->id;
    }

    
}
