<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Container\Attributes\Auth;

class UserPolicy
{
    public function is_admin(User $user)
    {
        return $user->is_admin;
    }
    public function no_admin(User $user)
    {
        if(!$user->is_admin)
        return true;
        return false;
    }
}
