<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hari;
use App\Models\JadwalAjar;
use App\Models\KelTadarus;
use App\Models\Khataman;
use App\Models\Role;
use App\Models\Sholatied;
use App\Models\Tadarus;
use App\Models\Takbiran;
use App\Models\Ustadh;
use App\Models\Warga;
use App\Models\Zakat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


    }
}
