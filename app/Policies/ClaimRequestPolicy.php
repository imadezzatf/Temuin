<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ClaimRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClaimRequestPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ClaimRequest');
    }

    public function view(AuthUser $authUser, ClaimRequest $claimRequest): bool
    {
        return $authUser->can('View:ClaimRequest');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ClaimRequest');
    }

    public function update(AuthUser $authUser, ClaimRequest $claimRequest): bool
    {
        return $authUser->can('Update:ClaimRequest');
    }

    public function delete(AuthUser $authUser, ClaimRequest $claimRequest): bool
    {
        return $authUser->can('Delete:ClaimRequest');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:ClaimRequest');
    }

    public function restore(AuthUser $authUser, ClaimRequest $claimRequest): bool
    {
        return $authUser->can('Restore:ClaimRequest');
    }

    public function forceDelete(AuthUser $authUser, ClaimRequest $claimRequest): bool
    {
        return $authUser->can('ForceDelete:ClaimRequest');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ClaimRequest');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ClaimRequest');
    }

    public function replicate(AuthUser $authUser, ClaimRequest $claimRequest): bool
    {
        return $authUser->can('Replicate:ClaimRequest');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ClaimRequest');
    }

}