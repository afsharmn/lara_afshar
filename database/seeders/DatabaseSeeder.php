<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$0mFUIajYL1tohLzoUBtZVO740w6OcbTzlgpI6ar/3jL5dYYLbEMI2', //admin
        ]);

        Admin::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => '$2y$12$0mFUIajYL1tohLzoUBtZVO740w6OcbTzlgpI6ar/3jL5dYYLbEMI2', //admin
        ]);

    }
}
