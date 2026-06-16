<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ItemReceipt;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemReceiptPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ItemReceipt');
    }

    public function view(AuthUser $authUser, ItemReceipt $itemReceipt): bool
    {
        return $authUser->can('View:ItemReceipt');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ItemReceipt');
    }

    public function update(AuthUser $authUser, ItemReceipt $itemReceipt): bool
    {
        return $authUser->can('Update:ItemReceipt');
    }

    public function delete(AuthUser $authUser, ItemReceipt $itemReceipt): bool
    {
        return $authUser->can('Delete:ItemReceipt');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:ItemReceipt');
    }

    public function restore(AuthUser $authUser, ItemReceipt $itemReceipt): bool
    {
        return $authUser->can('Restore:ItemReceipt');
    }

    public function forceDelete(AuthUser $authUser, ItemReceipt $itemReceipt): bool
    {
        return $authUser->can('ForceDelete:ItemReceipt');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ItemReceipt');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ItemReceipt');
    }

    public function replicate(AuthUser $authUser, ItemReceipt $itemReceipt): bool
    {
        return $authUser->can('Replicate:ItemReceipt');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ItemReceipt');
    }

}