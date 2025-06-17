<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can update the car.
     */
    public function update(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }

    /**
     * Determine if the user can delete the car.
     */
    public function delete(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }
}
