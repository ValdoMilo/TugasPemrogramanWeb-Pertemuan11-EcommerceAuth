<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // Admin bisa melakukan apapun
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Post $post): bool
    {
        return true;
    }

    // Admin & editor bisa create
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    // Admin (via before) & editor (pemilik) bisa update
    public function update(User $user, Post $post): bool
    {
        return $user->isEditor() && $user->id === $post->user_id;
    }

    // Admin (via before) & editor (pemilik) bisa delete
    public function delete(User $user, Post $post): bool
    {
        return $user->isEditor() && $user->id === $post->user_id;
    }
}