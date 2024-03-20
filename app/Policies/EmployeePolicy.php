<?php

namespace App\Policies;

use App\Enums\CompanyProfileEnum;
use App\Enums\UserProfileEnum;
use App\Models\Employee;
use App\Models\User;

class EmployeePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value ? true : false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value || $employee->id == $user->id ? true : false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value ? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value ? true : false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        return $user->profile === UserProfileEnum::ADMIN->value || $employee->profile == CompanyProfileEnum::COMPANY_ADMIN->value ? true : false;
    }
}
