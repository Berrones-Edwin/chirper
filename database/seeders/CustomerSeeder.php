<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

final class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Customer::factory()->count(25)->hasInvoices(10)->create();
        Customer::factory()->count(100)->hasInvoices(3)->create();
        Customer::factory()->count(50)->hasInvoices(7)->create();
        Customer::factory()->count(70)->create();
    }
}
