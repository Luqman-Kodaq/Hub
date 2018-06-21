<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getPermission($user, 6);
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getPermission($user, 5);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getPermission($user, 7);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\post  $post
     * @return mixed
     */
    public function delete(User $user, post $post)
    {
        return $this->getPermission($user, 8);
    }

    protected function getPermission($user, $p_id)
    {
        foreach($user->roles as $role)
        {
            foreach($role->permissions as $permission)
            {
                if($permission->id == $p_id)
                {
                    return true;
                }
            }
        }
            return false;
    }
}
