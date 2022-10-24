<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => 123456,
            'role' => UserRole::ADMIN(),
            'status' => UserStatus::ACTIVE(),
            'created_at' => Carbon::yesterday(),
            'updated_at' => Carbon::today()
        ]);
    }
}
