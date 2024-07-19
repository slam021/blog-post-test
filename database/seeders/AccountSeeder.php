<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Account::truncate();
        Schema::enableForeignKeyConstraints();

        Account::insert([
            'name' => 'Administrator',
            'user_name' => 'admin',
            'password' => Hash::make('12345678'),
            'email' => 'admin@email.com',
            'role_id' => 1, //admin
        ]);
    }
}
