<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            DB::table('mesas')->insert([
                'capacidade' => rand(2, 10),  // Gera um número aleatório entre 2 e 10
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
