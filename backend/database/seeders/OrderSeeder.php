<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()
            ->count(5)
            ->hasOrderDetails(10)
            ->create();
        Order::factory()
            ->count(10)
            ->hasOrderDetails(5)
            ->create();
        Order::factory()
            ->count(25)
            ->hasOrderDetails(10)
            ->create();
    }
}