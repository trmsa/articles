<?php

namespace App\Policies;

use App\Models\Cosmology;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CosmologyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cosmology  $cosmology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Cosmology $cosmology)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->major === 'نجوم';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cosmology  $cosmology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Cosmology $cosmology)
    {
        if($user->major === 'نجوم' && $user->id === $cosmology->user_id) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cosmology  $cosmology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Cosmology $cosmology)
    {
        if($user->major === 'نجوم' && $user->id === $cosmology->user_id) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cosmology  $cosmology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Cosmology $cosmology)
    {
        if($user->major === 'نجوم' && $user->id === $cosmology->user_id) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cosmology  $cosmology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Cosmology $cosmology)
    {
        //
    }
}
