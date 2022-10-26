<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Origin;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(
            // [CustomerSeeder::class],
            // [BrandSeeder::class],
            // [CategorySeeder::class],
            // [OriginSeeder::class]
            // [ProductSeeder::class]
            // [OrderDetailSeeder::class]
            [OrderSeeder::class]
        );
    }
}
