<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listRole = ['panitia','takmir'];
        for ($i = 0; $i < count($listRole); $i++) {
            Role::create([
                'nama_role' => $listRole[$i],
            ]);
        }
        for ($i=0; $i < 5; $i++) { 
            \App\Models\User::factory()->create([
                'id_role'           => $i%2==0 ? 1 : 2,
                'name'              => $i%2==0 ? 'Panitia' : 'Takmir',
                'email'             => $i%2==0 ? 'panitia'.$i.'@gmail.com' : 'takmir'.$i.'@gmail.com',
                'email_verified_at' => now(),
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token'    => Str::random(10),
            ]);
        }
    }
}
