<?php

namespace Database\Seeders;

use App\Models\CompanySector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_companies_sectors = config('company_sector');
        foreach ($all_companies_sectors as $company_sector) {
            $new_company_sector = new CompanySector();
            $new_company_sector->company_id = $company_sector['company_id'];
            $new_company_sector->sector_id = $company_sector['sector_id'];
            $new_company_sector->save();
        }
    }
}
