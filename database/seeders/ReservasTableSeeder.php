<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('reservas')->insert([
                'mesa_id' => rand(1, 15),
                'nome_reserva' => $faker->name(),
                'quantidade_pessoas' => rand(1, 10),
                'data_hora_reserva' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d H:i:s'),
                'user_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
