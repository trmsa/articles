<?php

namespace App\Policies;

use App\Models\Biology;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiologyPolicy
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
     * @param  \App\Models\Biology  $biology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Biology $biology)
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
        return $user->major === 'زیست شناسی';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Biology  $biology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Biology $biology)
    {
        if($user->major === 'زیست شناسی' && $user->id === $biology->user_id) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Biology  $biology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Biology $biology)
    {
        if($user->major === 'زیست شناسی' && $user->id === $biology->user_id) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Biology  $biology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Biology $biology)
    {
        if($user->major === 'زیست شناسی' && $user->id === $biology->user_id) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Biology  $biology
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Biology $biology)
    {
        //
    }
}
