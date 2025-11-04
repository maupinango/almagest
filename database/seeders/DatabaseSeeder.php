<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Transport::factory(5)->create();
        \App\Models\PaymentTerm::factory(5)->create();
        \App\Models\BankEntity::factory(5)->create();
        \App\Models\DeliveryTerm::factory(5)->create();
        \App\Models\Discount::factory(5)->create();
        \App\Models\Company::factory(10)->create();
        \App\Models\User::factory(20)->create();
    }
}
