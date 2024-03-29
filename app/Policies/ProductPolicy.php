<?php

namespace App\Policies;

use App\Enums\CompanyProfileEnum;
use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        return ($user->profile == CompanyProfileEnum::COMPANY_ADMIN->value || $user->profile == CompanyProfileEnum::COMPANY_EMPLOYEE->value) && $user->company_id == $product->company_id ? true : false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Product $product): bool
    {
        return $user->profile == CompanyProfileEnum::COMPANY_ADMIN->value && $user->company_id == $product->company_id ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->profile == CompanyProfileEnum::COMPANY_ADMIN->value && $user->company_id == $product->company_id ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->profile == CompanyProfileEnum::COMPANY_ADMIN->value && $user->company_id == $product->company_id ? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return $user->profile == CompanyProfileEnum::COMPANY_ADMIN->value && $user->company_id == $product->company_id ? true : false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->profile == CompanyProfileEnum::COMPANY_ADMIN->value && $user->company_id == $product->company_id ? true : false;
    }
}
