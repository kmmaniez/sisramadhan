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
use App\Models\Tarawih;
use App\Models\Ustadh;
use App\Models\Warga;
use App\Models\Zakat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* START SETTINGS ROLE, USERS (TAKMIR/PANITIA) & OTHER */
            $fakerID = fake('id_ID');
            $listTahun = ['2023', '2022', '2021'];
            $listHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            $listGender = ['pria', 'wanita']; // sesuai tabel migration
            $listRole = ['panitia','takmir'];
            for ($i = 0; $i < count($listRole); $i++) {
                Role::create([
                    'nama_role' => $listRole[$i],
                ]);
            }

            // CREATE USER TAKMIR/PANITIA
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
        /* END SETTINGS ROLE & OTHER */

        /* WARGA SEEDER START*/
            for ($i = 0; $i < 15; $i++) {
                Warga::create([
                    'nama_asli'     => $fakerID->name(),
                    'nama_alias'    => $fakerID->firstName(),
                    'alamat'        => $fakerID->streetAddress(),
                    'rt'            => rand(1, 20),
                    'rw'            => rand(1, 10),
                    'nomor_hp'      => $fakerID->phoneNumber(),
                    'email'         => $fakerID->email(),
                    'status_keaktifan' => rand(0,1)
                ]);
            }
        /* WARGA SEEDER END*/

        /* TADARUS SEEDER START*/
            $kelompok = ['Bapak-bapak', 'Ibu-ibu', 'Anak-anak', 'Ibu-ibu Arisan'];

            for ($i=0; $i < 4; $i++) { 
                Tadarus::create([
                    'tahun_kegiatan'    => $fakerID->date(),
                    'nama_kelompok'     => $kelompok[$i],
                    'nama_warga'        => json_encode([
                        'Jajang','Miranda','Hendra'
                    ]),
                    'jumlah_khatam'     => rand(1,30),
                ]);
            }
        /* TADARUS SEEDER END*/

        /* TPA SEEDER START */
            // Hari
            for ($i = 0; $i < count($listHari); $i++) {
                Hari::create([
                    'nama_hari' => $listHari[$i]
                ]);
            }

            // Ustad/h
            for ($i = 0; $i < 5; $i++) {
                Ustadh::create([
                    'nama'          => $fakerID->name(),
                    'jenis_kelamin' => $listGender[rand(0, 1)],
                    'no_hp'         => $fakerID->phoneNumber,
                    'status'        => 'A',
                ]);
            }

            // Jadwal ajar
            for ($i = 0; $i < 5; $i++) {
                JadwalAjar::create([
                    'id_ustadh'     => $i + 1,
                    'id_hari'       => rand(1, 6),
                    'tahun'         => $listTahun[rand(0, count($listTahun) -1)],
                    'tgl_masehi'    => $fakerID->date('Y/m/d'),
                    'keterangan'    => 'Mengajar Al-Qur\'an & iqra',
                ]);
            }
        /* TPA SEEDER END*/

        /* SEEDER SHOLAT IED, KHATAMAN, ZAKAT */
            // Sholat
            for ($i = 0; $i < 5; $i++) {
                Sholatied::create([
                    'tgl_kegiatan'  => $fakerID->date(),
                    'tmpt_sholat'   => 'Masjid Darussalam',
                    'keterangan'    => 'Melaksanakan sholat IED di Masjid Darussalam',
                ]);
            }

            // Khataman
            for ($i = 0; $i < 5; $i++) {
                Khataman::create([
                    'tgl_kegiatan'      => $fakerID->date(),
                    'jenis_kegiatan'    => $fakerID->text(15),
                    'keterangan'        => $fakerID->text('25'),
                ]);
            }

            // Zakat
            $petugasZakat = [];
            $penerimaZakat = [];
            for ($i = 0; $i < 4; $i++) {
                $petugasZakat[]     = $fakerID->firstName();
                $penerimaZakat[]    = $fakerID->lastName();
            }
            $listPetugasZakat   = json_encode($petugasZakat);
            $listPenerimaZakat  = json_encode($penerimaZakat);
            for ($i = 0; $i < 5; $i++) {
                Zakat::create([
                    'nama_petugas_zakat'    => $listPetugasZakat,
                    'nama_penerima_zakat'   => $listPenerimaZakat,
                    'tgl_kegiatan'          => $fakerID->date(),
                    'keterangan'            => $fakerID->text(15),
                ]);
            }
        /* SEEDER SHOLAT IED, KHATAMAN, ZAKAT */

        /* TAKBIRAN SEEDER START*/
            // for ($i = 0; $i < 5; $i++) {
            //     Takbiran::create([
            //         'id_warga'      => rand(1, 10),
            //         'tgl_kegiatan'  => $fakerID->date(),
            //         'keterangan'    => 'Takbiran di Masjid Darussalam',
            //     ]);
            // }
        /* TAKBIRAN SEEDER END*/
        
        /* TARAWIH SEEDER START*/
            for ($i = 0; $i < 15; $i++) {
                Tarawih::create([
                    'tgl_kegiatan'  => $fakerID->date(),
                    'id_imam'       => rand(1, 5),
                    'id_penceramah' => rand(5, 10),
                    'id_bilal'      => rand(10, 15),
                    'keterangan'    => 'TARAWIH di Masjid Darussalam',
                ]);
            }
        /* TARAWIH SEEDER END*/
    }
}
