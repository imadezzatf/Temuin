<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FoundItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoundItemPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FoundItem');
    }

    public function view(AuthUser $authUser, FoundItem $foundItem): bool
    {
        return $authUser->can('View:FoundItem');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FoundItem');
    }

    public function update(AuthUser $authUser, FoundItem $foundItem): bool
    {
        return $authUser->can('Update:FoundItem');
    }

    public function delete(AuthUser $authUser, FoundItem $foundItem): bool
    {
        return $authUser->can('Delete:FoundItem');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:FoundItem');
    }

    public function restore(AuthUser $authUser, FoundItem $foundItem): bool
    {
        return $authUser->can('Restore:FoundItem');
    }

    public function forceDelete(AuthUser $authUser, FoundItem $foundItem): bool
    {
        return $authUser->can('ForceDelete:FoundItem');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FoundItem');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FoundItem');
    }

    public function replicate(AuthUser $authUser, FoundItem $foundItem): bool
    {
        return $authUser->can('Replicate:FoundItem');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FoundItem');
    }

}