<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([250, 500, 1000, 2000, 5000])->each(function ($size) {
            Pack::factory()->create(['size' => $size]);
        }
        );

    }
}
