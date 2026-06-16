<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SecurityPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class SecurityPostPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SecurityPost');
    }

    public function view(AuthUser $authUser, SecurityPost $securityPost): bool
    {
        return $authUser->can('View:SecurityPost');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SecurityPost');
    }

    public function update(AuthUser $authUser, SecurityPost $securityPost): bool
    {
        return $authUser->can('Update:SecurityPost');
    }

    public function delete(AuthUser $authUser, SecurityPost $securityPost): bool
    {
        return $authUser->can('Delete:SecurityPost');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SecurityPost');
    }

    public function restore(AuthUser $authUser, SecurityPost $securityPost): bool
    {
        return $authUser->can('Restore:SecurityPost');
    }

    public function forceDelete(AuthUser $authUser, SecurityPost $securityPost): bool
    {
        return $authUser->can('ForceDelete:SecurityPost');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SecurityPost');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SecurityPost');
    }

    public function replicate(AuthUser $authUser, SecurityPost $securityPost): bool
    {
        return $authUser->can('Replicate:SecurityPost');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SecurityPost');
    }

}