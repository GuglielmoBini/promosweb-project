<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_sectors = config('sectors');
        foreach ($all_sectors as $sector) {
            $new_sector = new Sector();
            $new_sector->name = $sector['name'];
            $new_sector->save();
        }
    }
}
