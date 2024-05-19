<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'type' => '1',
            ],
            [
                'name' => 'Cashier',
                'email' => 'cashier@gmail.com',
                'password' => bcrypt('12345678'),
                'type' => '0',
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
        // \App\Models\User::factory()->create([
        //     ['name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'type' => '1'],
        //     ['name' => 'Cashier',
        //     'email' => 'cashier@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'type' => '0']
        // ]);
    }
}
