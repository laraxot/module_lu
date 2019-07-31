<?php
namespace Modules\LU\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\Area as Post;
use Modules\LU\Models\User;

class AreaPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if (isset($user->perm) && $user->perm->perm_type >= 5) {  //superadmin
            return true;
        }
    }

    /*
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
    */

    public function indexAttach(User $user, Post $post){
        return true;
    }
    
    public function attach(User $user, Post $post){
        return true;
    }

    public function create(User $user){
        return true;
    }

    public function detach(User $user, Post $post){
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
        return true;
    }

    public function indexEdit(User $user, Post $post){
        return true;
    }
}
