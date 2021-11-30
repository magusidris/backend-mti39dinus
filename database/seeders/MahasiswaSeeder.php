<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'short' => 'p31202102418',
            'npm'   => 'p31.2021.02418',
            'name'  => 'Sukma Ayu Septianingrum',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102419',
            'npm'   => 'p31.2021.02419',
            'name'  => "Munif Ma'arij Kholil",
        ]);
        Mahasiswa::create([
            'short' => 'p31202102420',
            'npm'   => 'p31.2021.02420',
            'name'  => 'Arnold Pompei Kalfo',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102421',
            'npm'   => 'p31.2021.02421',
            'name'  => 'Danny Deczi Nasdal',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102422',
            'npm'   => 'p31.2021.02422',
            'name'  => 'Ayu Hernita',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102423',
            'npm'   => 'p31.2021.02423',
            'name'  => 'Maulana Oktafa Rendrar Putra',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102424',
            'npm'   => 'p31.2021.02424',
            'name'  => 'Oki Derajat Sudarmojo',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102425',
            'npm'   => 'p31.2021.02425',
            'name'  => 'Mochammad Agus Idris',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102426',
            'npm'   => 'p31.2021.02426',
            'name'  => 'Arif Rifan Rudiyanto',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102427',
            'npm'   => 'p31.2021.02427',
            'name'  => 'Triga Agus Sugianto',
        ]);
        Mahasiswa::create([
            'short' => 'p31202102428',
            'npm'   => 'p31.2021.02428',
            'name'  => 'Bagas Dwi Yulianto',
        ]);
    }
}
