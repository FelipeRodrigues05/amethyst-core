<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->create([
            'company_name' => 'Amethyst',
            'company_phone' => '011967898414',
            'company_email' => 'amethyst@core.com',
            'company_type' => 'pj',
            'product_id' => 1,
            'employee_id' => 1,
        ]);
        Company::factory(10)->create();

    }
}
