<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Penghargaan Kejuaraan Tingkat International
        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 1,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 50,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 1,                                     // Juara 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 2,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 40,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 2,                                     // Juara 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 3,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 30,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 3,                                     // Juara 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 4,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 20,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 4,                                     // Harapan 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 5,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 20,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 5,                                     // Harapan 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 6,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 20,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 6,                                     // Harapan 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 7,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 15,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 1,                                     // International
            'ref_peran_prestasi_id' => 7,                                     // Peserta
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);


        // Penghargaan Kejuaraan Tingkat Nasional

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 8,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 40,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 1,                                     // Juara 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 9,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 30,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 2,                                     // Juara 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 10,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 20,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 3,                                     // Juara 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 11,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 15,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 4,                                     // Harapan 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 12,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 15,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 5,                                     // Harapan 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 13,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 15,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 6,                                     // Harapan 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 14,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 10,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 2,                                     // Nasional
            'ref_peran_prestasi_id' => 7,                                     // Peserta
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        // Penghargaan Kejuaraan Tingkat Regional

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 15,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 30,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 1,                                     // Juara 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 16,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 20,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 2,                                     // Juara 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 17,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 15,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 3,                                     // Juara 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 18,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 10,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 4,                                     // Harapan 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 19,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 10,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 5,                                     // Harapan 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 20,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 10,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 6,                                     // Harapan 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 21,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 5,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 3,                                     // Regional
            'ref_peran_prestasi_id' => 7,                                     // Peserta
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        // Penghargaan Kejuaraan Tingkat Universitas

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 22,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 20,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 4,                                     // Universitas
            'ref_peran_prestasi_id' => 1,                                     // Juara 1
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 23,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 15,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 4,                                     // Universitas
            'ref_peran_prestasi_id' => 2,                                     // Juara 2
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

        DB::table('bobot_nilai')->insert([
            'id_bobot_nilai'        => 24,
            'keterangan'            => 'Bobot Nilai penghargaan kejuaraan',
            'bobot'                 => 10,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
            'ref_penyelenggara_id'  => 1,                                     //Pusat Belmawa
            'ref_tingkat_id'        => 4,                                     // Universitas
            'ref_peran_prestasi_id' => 3,                                     // Juara 3
            'ref_jenis_kegiatan_id' => 1,                                     //Penghargaan Kejuaraan
        ]);

    }
}
