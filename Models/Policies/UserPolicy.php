<?php
namespace Modules\LU\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as Post;
use Modules\LU\Models\User;

use Modules\Xot\Traits\XotBasePolicyTrait;

use Modules\Xot\Models\Policies\XotBasePolicy;

class UserPolicy extends XotBasePolicy{
    //use HandlesAuthorization;
    //use XotBasePolicyTrait;

    /*
    public function before($user, $ability)
    {
        if (isset($user->perm) && $user->perm->perm_type >= 5) {  //superadmin
            return true;
        }
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function edit(User $user, Post $post)
    {
        if ($post->created_by == $user->handle) {
            return true;
        }

        return false;
    }
    public function update(User $user, Post $post)
    {
        if ($post->created_by == $user->handle) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Post $post)
    {
        if ($post->created_by == $user->handle) {
            return true;
        }

        return false;
    }

    public function show(User $user, Post $post)
    {
        return false;
    }

    public function indexEdit(User $user, Post $post){
        return true;
    }
    */
}
