<?php

namespace Database\Seeders;

use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use App\Models\Kategori;
use App\Models\NilaiAlternatif;
use App\Models\NilaiKriteria;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Kategori::create([
            'keterangan' => 'Santri'
        ]);
        Kategori::create([
            'keterangan' => 'Pengurus'
        ]);

        User::create([
            'nama_lengkap' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'kamar' => 'B1',
            'kategori_id' => 1,
        ]);

        DataKriteria::create([
            'nama_kriteria' => 'Tengibles',
        ]);
        DataKriteria::create([
            'nama_kriteria' => 'Realiability',
        ]);
        DataKriteria::create([
            'nama_kriteria' => 'Responsiveness',
        ]);
        DataKriteria::create([
            'nama_kriteria' => 'Asurance',
        ]);
        DataKriteria::create([
            'nama_kriteria' => 'Empathy',
        ]);

        $not_in = [];
        $kriteria = DataKriteria::get();
        foreach ($kriteria as $key => $kriteria1) {
            $not_in_id[$kriteria1->id] = $kriteria1->id;
            // if ($kriteria1->id != 1) {
            //     array_push($not_in, $kriteria1->id);
            //     $kriteria_not_in = DataKriteria::whereNotIn('id', $not_in)->get();
            // } else {
            array_push($not_in, $kriteria1->id);
            $kriteria_not_in = DataKriteria::whereNotIn('id', $not_in)->get();
            // }
            foreach ($kriteria as $key => $kriteria2) {
                NilaiKriteria::create([
                    'user_id' => 1,
                    'kriteria1_id' => $kriteria1->id,
                    'kriteria2_id' => $kriteria2->id,
                    'nilai' => 1,
                ]);
            }
        }

        DataAlternatif::create([
            'kriteria_id' => 1,
            'nama_alternatif' => 'uks',
        ]);
        DataAlternatif::create([
            'kriteria_id' => 1,
            'nama_alternatif' => 'kantin',
        ]);
        DataAlternatif::create([
            'kriteria_id' => 1,
            'nama_alternatif' => 'laundry',
        ]);



        $not_in = [];
        $alternatif = DataAlternatif::where('kriteria_id', '=', 1)->get();
        foreach ($alternatif as $key => $alternatif1) {
            $not_in_id[$alternatif1->id] = $alternatif1->id;
            // if ($kriteria1->id != 1) {
            //     array_push($not_in, $kriteria1->id);
            //     $kriteria_not_in = DataKriteria::whereNotIn('id', $not_in)->get();
            // } else {
            array_push($not_in, $alternatif1->id);
            $alternatif_not_in = DataAlternatif::whereNotIn('id', $not_in)->get();
            // }
            foreach ($alternatif as $key => $alternatif2) {
                NilaiAlternatif::create([
                    'user_id' => 1,
                    'kriteria_id' => 1,
                    'alternatif1_id' => $alternatif1->id,
                    'alternatif2_id' => $alternatif2->id,
                    'nilai' => 1,
                ]);
            }
        }

        DataAlternatif::create([
            'kriteria_id' => 2,
            'nama_alternatif' => 'dapur',
        ]);
        DataAlternatif::create([
            'kriteria_id' => 2,
            'nama_alternatif' => 'kamar mandi',
        ]);
        DataAlternatif::create([
            'kriteria_id' => 2,
            'nama_alternatif' => 'kelas',
        ]);

        $not_in = [];
        $alternatif = DataAlternatif::where('kriteria_id', '=', 2)->get();
        foreach ($alternatif as $key => $alternatif1) {
            $not_in_id[$alternatif1->id] = $alternatif1->id;
            // if ($kriteria1->id != 1) {
            //     array_push($not_in, $kriteria1->id);
            //     $kriteria_not_in = DataKriteria::whereNotIn('id', $not_in)->get();
            // } else {
            array_push($not_in, $alternatif1->id);
            $alternatif_not_in = DataAlternatif::whereNotIn('id', $not_in)->get();
            // }
            foreach ($alternatif as $key => $alternatif2) {
                NilaiAlternatif::create([
                    'user_id' => 1,
                    'kriteria_id' => 2,
                    'alternatif1_id' => $alternatif1->id,
                    'alternatif2_id' => $alternatif2->id,
                    'nilai' => 1,
                ]);
            }
        }
    }
}
