<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('transactions')->insert([
                'client_id' => $faker->numberBetween(1, 50),
                'transaction_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'amount' => $faker->randomFloat(2, 10, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
