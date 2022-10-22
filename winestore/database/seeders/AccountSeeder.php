<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Account;
use Illuminate\Support\Str;


class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Account::factory()->count(5)->create();

        // Account::factory()->create([
        //     'name' => 'Nguyễn Thị Minh Thư',
        //     'email' => 'minhthu@gmail.com',
        //     'phone' => fake()->unique()->phoneNumber(),
        //     'email_verified_at' => now(),
        //     'password' => 122332, // password
        //     'remember_token' => Str::random(8),
        // ]);
    }
}
