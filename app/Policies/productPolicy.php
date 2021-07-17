<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class productPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Product $product)
    {
        return $user->id == $product->user_id;
    }
}
