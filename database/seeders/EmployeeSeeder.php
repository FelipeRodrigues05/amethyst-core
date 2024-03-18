<?php

namespace Database\Seeders;

use App\Enums\CompanyProfileEnum;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->create([
            'name' => 'Felipe Rodrigues',
            'email' => 'fehzin_@outlook.com',
            'password' => Hash::make('password'),
            'company_profile' => CompanyProfileEnum::COMPANY_ADMIN->value,
            'company_id' => 1,
        ]);
        
        Employee::factory(10)->create();

    }
}
